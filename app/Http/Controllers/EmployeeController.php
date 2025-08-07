<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function show($id) { 

        $employee = Employee::with('company')->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    public function edit($id) 
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();

        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:64',
            'last_name' => 'required|string|max:64',
            'email' => 'nullable|email|max:128',
            'phone' => 'nullable|regex:/^[0-9\s\-\+\(\)]+$/|min:7|max:20',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        return redirect()->route('employees.show', $id);
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|regex:/^[0-9\s\-\+\(\)]+$/|min:7|max:20',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index');
    }    

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
