<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Str; // to be used directly inside the .blade files

class CompanyController extends Controller
{
    public function index() 
    { 
        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function show($id) 
    {
        $company = Company::with('employees')->findOrFail($id);

        return view('companies.show', compact('company'));
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
        
        if ($request->hasFile('logo')) { // if request has new logo, delete old logo if it exists
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }

            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
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
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }

        $company = Company::create($validated);

        return redirect()->route('companies.show', $company->id);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        if ($company->logo) { // if the company has set logo, delete from storage
            Storage::disk('public')->delete($company->logo);
        }

        $company->delete();

        return redirect()->route('companies.index');
    }
}
