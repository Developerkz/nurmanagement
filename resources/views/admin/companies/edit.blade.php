@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel" style="padding: 10px">
                    <div class="panel-header">
                        <h2>Изменить</h2>
                        <a class="btn btn-primary btn-sm" href="{{route('company.index')}}">Назад</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('company.update' ,['id'=>$company->id])}}"
                              method="post">
                            <div class="form-group">
                                <label>Наименование</label>
                                <input type="text" value="{{$company->name}}" name="name" class="form-control" placeholder="Наименование" required>
                            </div>
                            <div class="form-group">
                                <label>Дата регистрации</label>
                                <input type="date" value="{{$company->registration_date}}" name="registration_date" class="form-control" placeholder="Дата регистрации" required>
                            </div>
                            <div class="form-group">
                                <label>Пользователь</label>
                                <select name="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option {{$user->id == $company->user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->first_name.' '.$user->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Тип компании</label>
                                <select name="company_type_id" class="form-control">
                                    @foreach($companyTypes as $companyType)
                                        <option  {{$companyType->id == $company->companyType->id ? 'selected' : ''}} value="{{$companyType->id}}">{{$companyType->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Шаблон</label>
                                <select name="template-id" class="form-control">
                                    @foreach($templates as $template)
                                        <option {{$template->id == $company->template_id ? 'selected' : ''}} value="{{$template->id}}">{{$template->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @foreach($inputs as $input)
                                <div class="form-group">
                                    <label>{{$input->title}}</label>
                                    <input type="{{$input->type}}" value="{{json_decode($company->data, true)[$input->name]}}" name="{{$input->name}}" class="form-control" placeholder="{{$input->title}}"/>
                                </div>
                            @endforeach

                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Изменить">
                            </div>
                        </form>

                    </div>
                </div>
                <div class="panel-footer">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
