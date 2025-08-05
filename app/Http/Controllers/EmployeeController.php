<?php

namespace App\Http\Controllers;

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
}
