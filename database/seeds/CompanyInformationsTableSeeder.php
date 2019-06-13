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

        $this->ip();
        $this->too();
        $this->oo();

    }


    public function ip()
    {
        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "fio";
        $data->title = "ФИО";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "iin";
        $data->title = "ИИН";
        $data->type = "number";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "er_registration_date";
        $data->title = "Дата регистраций ИП";
        $data->type = "date";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "er_name";
        $data->title = "Наименование ИП";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "signing_address";
        $data->title = "Адрес прописки";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "real_address";
        $data->title = "Адрес местонахождения ИП";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 1;
        $data->name = "contact_details";
        $data->title = "Контактные данные";
        $data->type = "text";
        $data->save();
        $data = new \App\CompanyInfo();

        $data->company_type_id = 1;
        $data->name = "bank_requisite";
        $data->title = "Банковские реквизиты";
        $data->type = "text";
        $data->save();

        $data->company_type_id = 1;
        $data->name = "oked";
        $data->title = "ОКЭД";
        $data->type = "text";
        $data->save();


        $data->company_type_id = 1;
        $data->name = "kkm";
        $data->title = "ККМ";
        $data->type = "text";
        $data->save();
    }

    public function too()
    {
        $data = new \App\CompanyInfo();
        $data->company_type_id = 2;
        $data->name = "bin";
        $data->title = "БИН";
        $data->type = "number";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 2;
        $data->name = "too_name";
        $data->title = "Наименование ТОО";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 2;
        $data->name = "judicial_address";
        $data->title = "Юридический адрес";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 2;
        $data->name = "director";
        $data->title = "Директор";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 2;
        $data->name = "founder";
        $data->title = "Учредитель";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 2;
        $data->name = "contact_details";
        $data->title = "Контактные данные";
        $data->type = "text";
        $data->save();
        $data = new \App\CompanyInfo();

        $data->company_type_id = 2;
        $data->name = "bank_requisite";
        $data->title = "Банковские реквизиты";
        $data->type = "text";
        $data->save();

        $data->company_type_id = 2;
        $data->name = "oked";
        $data->title = "ОКЭД";
        $data->type = "text";
        $data->save();


        $data->company_type_id = 2;
        $data->name = "kkm";
        $data->title = "ККМ";
        $data->type = "text";
        $data->save();

        $data->company_type_id = 2;
        $data->name = "tax_info";
        $data->title = "Сведение о налоговой регистрации";
        $data->type = "text";
        $data->save();

        $data->company_type_id = 2;
        $data->name = "authorized_capital";
        $data->title = "Уставной капитал";
        $data->type = "text";
        $data->save();
    }


    public function oo()
    {
        $data = new \App\CompanyInfo();
        $data->company_type_id = 3;
        $data->name = "bin";
        $data->title = "БИН";
        $data->type = "number";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 3;
        $data->name = "too_name";
        $data->title = "Наименование";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 3;
        $data->name = "judicial_address";
        $data->title = "Юридический адрес";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 3;
        $data->name = "head";
        $data->title = "Руководитель";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 3;
        $data->name = "members";
        $data->title = "Участники";
        $data->type = "text";
        $data->save();

        $data = new \App\CompanyInfo();
        $data->company_type_id = 3;
        $data->name = "contact_details";
        $data->title = "Контактные данные";
        $data->type = "text";
        $data->save();
        $data = new \App\CompanyInfo();

        $data->company_type_id = 3;
        $data->name = "bank_requisite";
        $data->title = "Банковские реквизиты";
        $data->type = "text";
        $data->save();

        $data->company_type_id = 3;
        $data->name = "oked";
        $data->title = "ОКЭД";
        $data->type = "text";
        $data->save();


        $data->company_type_id = 3;
        $data->name = "kkm";
        $data->title = "ККМ";
        $data->type = "text";
        $data->save();

        $data->company_type_id = 3;
        $data->name = "tax_info";
        $data->title = "Сведение о налоговой регистрации";
        $data->type = "text";
        $data->save();
    }
}
