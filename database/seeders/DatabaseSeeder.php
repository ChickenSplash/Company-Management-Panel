<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);

        Company::factory(10)->create()->each(function ($company) {
            // Create 5 employees for each company
            Employee::factory(rand(1, 10))->create([
                'company_id' => $company->id,
            ]);
        });
    }
}