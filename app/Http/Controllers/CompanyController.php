<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;

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

        return view('companies.edit',  compact('company'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        $company = Company::findOrFail($id);
        $company->update($validated);
        
        return redirect()->route('companies.show', $id);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index');
    }
}
