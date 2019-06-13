<?php

use Illuminate\Database\Seeder;

class CompanyInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "iin";
        $data->name = "ИИН";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "er_registration_date";
        $data->name = "Дата регистраций ИП";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "er_name";
        $data->name = "Наименование ИП";
        $data->save();



    }
}
