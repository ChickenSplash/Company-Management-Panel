<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        
        $companies = Company::all();

        return view('dashboard', compact('companies'));
    }

    public function show($id) { // after user clicking on link of corresponding company card from dashboard, run this method

        $company = Company::findOrFail($id);

        return view('companies.show', compact('company'));
    }
}
