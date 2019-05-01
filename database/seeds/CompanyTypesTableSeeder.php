<?php

use Illuminate\Database\Seeder;

class CompanyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeIE = new \App\CompanyType();
        $typeIE->name = 'Индивидуальный предприниматель';
        $typeIE->save();

        $typeLLC = new \App\CompanyType();
        $typeLLC->name = 'Товарищество с ограниченной ответственностью';
        $typeLLC->save();

        $typeSO = new \App\CompanyType();
        $typeSO->name = 'Общественная организация';
        $typeSO->save();
    }
}
