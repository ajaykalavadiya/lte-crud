<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::factory(Company::class)->count(50)->create()->each(function (Company $company) {
            $company->employees()->saveMany( \App\Models\Employee::factory(Employee::class)->count(rand(11,50))->make());
        });
    }
}
