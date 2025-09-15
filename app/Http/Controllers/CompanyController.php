<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Str; // to be used directly inside the .blade files

class CompanyController extends Controller
{
    public function index(Request $request) 
    { 
        $sortBy = $request->get('sortBy', 'name'); // just so the default values are set on first load before user requests to sort anything
        $sortDirection = $request->get('sortDirection', 'asc');

        if ($sortBy === 'employees_count') {
            $companies = Company::withCount('employees')
                ->orderBy('employees_count', $sortDirection)
                ->paginate(10);
        } else {
            $companies = Company::withCount('employees') // still add count for display
                ->orderBy($sortBy, $sortDirection)
                ->paginate(10);
        }

        return view('companies.index', compact('companies', 'sortBy', 'sortDirection'));
    }

    public function show(Request $request, $id) 
    {
        $sortBy = $request->get('sortBy', 'last_name');
        $sortDirection = $request->get('sortDirection', 'asc');

        $company = Company::findOrFail($id);

        // Get sorted employees for this company
        $sortedEmployees = $company->employees()
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        return view('companies.show', compact('company', 'sortBy', 'sortDirection', 'sortedEmployees'));
    }

    public function edit($id) 
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $validated = $request->validated(); 

        $company = Company::findOrFail($id);
        
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                $oldLogoPath = public_path('images/' . $company->logo);
                if (File::exists($oldLogoPath)) {
                    File::delete($oldLogoPath);
                }
            }

            $file = $request->file('logo');

            $validated['logo'] = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('images'), $validated['logo']);
        }
        
        $company->update($validated);
        
        return redirect()->route('companies.show', $id);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request)
    {
        $validated = $request->validated(); 
        
        if ($request->hasFile('logo')) { // If a logo was uploaded with the form
            // Store the logo
            $file = $request->file('logo');

            $validated['logo'] = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('images'), $validated['logo']);
        }

        $company = Company::create($validated);

        return redirect()->route('companies.show', $company->id);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        if ($company->logo) { // if the company has set logo, delete from public/images
            $logoPath = public_path('images/' . $company->logo);
            if (File::exists($logoPath)) {
                File::delete($logoPath);
            }
        }

        $company->delete();

        return redirect()->route('companies.index');
    }
}
