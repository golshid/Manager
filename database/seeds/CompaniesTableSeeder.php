<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company1 = ['name' => 'company1', 'admin' => 'number1', 'slug' => str_slug('company1')];
        $company2 = ['name' => 'company2', 'admin' => 'number2', 'slug' => str_slug('company2')];
        $company3 = ['name' => 'company3', 'admin' => 'number3', 'slug' => str_slug('company3')];

        Company::create($company1);
        Company::create($company2);
        Company::create($company3);
        
    }
}
