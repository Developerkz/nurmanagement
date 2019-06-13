<?php

use Illuminate\Database\Seeder;

class CompanyInformationsTableSeeder extends Seeder
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
        $data->title = "ИИН";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "er_registration_date";
        $data->title = "Дата регистраций ИП";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "er_name";
        $data->title = "Наименование ИП";
        $data->save();

    }
}
