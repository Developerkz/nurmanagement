<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyInfo;
use App\CompanyType;
use App\Role;
use App\Template;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use
    Validator;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index' , compact("companies"));
    }

    public function create()
    {
        $companyTypes = CompanyType::all();
        $templates = Template::all();
        $users = User::where('role_id' , Role::CLIENT_ID)->get();
        if(count($companyTypes) == 0 || count($users) == 0){
            Session::flash('warning' , 'Типов компаний или пользователей не существует!');
            return redirect()->back();
        }
        return view('admin.companies.create', compact("companyTypes","users", "templates"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'user_id' =>'required|numeric| min:0',
            'template_id' =>'numeric| min:0',
            'company_type_id' =>'required|numeric| min:0',
            'registration_date' =>'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $company =  new Company();
            $company->fill($request->all());
            $company->save();
            Session::flash('success' , 'Компания успешно добавлена!');
            return redirect()->route('company.edit', ['id' => $company->id] );
        }
    }

    public function delete($id){
        $company = Company::find($id);
        if($company){
            $company->delete();
            Session::flash('success' , 'Компания успешно удаленa!');
        }else{
            Session::flash('error' , 'Компания не существует!');
        }
        return redirect()->back();
    }

    public function edit($id){
        $company = Company::find($id);
        $templates = Template::all();
        $companyTypes = CompanyType::all();
        $inputs = CompanyInfo::where('company_type_id',$company->company_type_id)->get();
        if(!$company){
            Session::flash('error' , 'Компания не существует!');
            return redirect()->back();
        }
        $users = User::where('role_id' , Role::CLIENT_ID)->get();
        if(count($companyTypes) == 0 || count($users) == 0){
            Session::flash('warning' , 'Типов компаний или пользователей не существует!');
            return redirect()->back();
        }

        return view('admin.companies.edit', compact('company', 'companyTypes',"users", "templates","inputs"));
    }

    public function update(Request $request, $id){
        $company = Company::find($id);
        if(!$company){
            Session::flash('error' , 'Компания не существует!');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'user_id' =>'required|numeric| min:0',
            'company_type_id' =>'required|numeric| min:0',
            'template_id' =>'numeric| min:0',
            'registration_date' =>'required|date',
        ]);

        if ($validator->fails()) {
            Session::flash('error' , 'Ошибка!');
            return redirect()->back()->withErrors($validator);
        }else{
            $company->fill($request->all());
            $company->save();
            Session::flash('success' , 'Компания успешно обновлена!');
            return redirect()->back();
        }
    }
}
