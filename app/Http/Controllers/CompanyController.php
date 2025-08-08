<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Nullable;

class CompanyController extends Controller
{
    public function index() 
    { 
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    public function show($id) 
    { // after user clicking on link of corresponding company card from dashboard, run this method
        $company = Company::with('employees')->findOrFail($id);

        return view('companies.show', compact('company'));
    }

    public function edit($id) 
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|dimensions:min_width=100,min_height=100|max:4096',
        ], [
            'logo.image' => 'The uploaded file must be an image.',
            'logo.mimes' => 'Logo must be a file of type: jpeg, png, jpg, gif.',
            'logo.dimensions' => 'Logo must be at least 100x100 pixels.',
            'logo.max' => 'Logo must not be larger than 4MB.',    
        ]);

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100|max:4096',
        ], [
            'logo.image' => 'The uploaded file must be an image.',
            'logo.mimes' => 'Logo must be a file of type: jpeg, png, jpg, gif.',
            'logo.dimensions' => 'Logo must be at least 100x100 pixels.',
            'logo.max' => 'Logo must not be larger than 4MB.',    
        ]);
        
        
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
