<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        
        $companyCount = Company::all()->count();
        $employeeCount = Employee::all()->count();

        return view('dashboard', compact('companyCount', 'employeeCount'));
    }
}
