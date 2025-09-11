<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companyCount = Company::count();
        $employeeCount = Employee::count();

        // Get 5 most recently created companies and employees
        $recentCompanies = Company::latest()->take(5)->get();
        $recentEmployees = Employee::latest()->take(5)->get();

        return view('dashboard', compact(
            'companyCount',
            'employeeCount',
            'recentCompanies',
            'recentEmployees'
        ));
    }
}