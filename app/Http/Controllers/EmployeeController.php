<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        
        $sortBy = $request->get('sortBy', 'last_name'); // just so the default values are set on first load before user requests to sort anything
        $sortDirection = $request->get('sortDirection', 'asc');

        $employees = Employee::orderBy($sortBy, $sortDirection)->paginate(10);

        return view('employees.index', compact('employees', 'sortBy', 'sortDirection'));
    }

    public function show($id) { 

        $employee = Employee::with('company')->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    public function edit($id) 
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::orderBy('name', 'asc')->get();

        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $validated = $request->validated();

        $employee = Employee::findOrFail($id);
        $employee->update($validated);

        return redirect()->route('employees.show', $id);
    }

    public function create($currentCompanyId = null)
    {
        $companies = Company::orderBy('name', 'asc')->get();
        return view('employees.create', compact('companies', 'currentCompanyId'));
    }

    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();

        $employee = Employee::create($validated);

        return redirect()->route('employees.show', $employee->id);
    }    

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
