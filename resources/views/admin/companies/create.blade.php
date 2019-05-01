@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel" style="padding: 10px">
                    <div class="panel-header">
                        <h2>Добавить компанию</h2>
                        <a  class="btn btn-primary btn-sm" href="{{route('company.index')}}">Назад</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('company.store')}}" method="post">
                            <div class="form-group">
                                <label>Наименование</label>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control" placeholder="Наименование" required>
                            </div>
                            <div class="form-group">
                                <label>Дата регистрации</label>
                                <input type="date" value="{{old('registration_date')}}" name="registration_date" class="form-control" placeholder="Дата регистрации" required>
                            </div>
                            <div class="form-group">
                                <label>Пользователь</label>
                                <select name="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->first_name.' '.$user->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Тип компании</label>
                                <select name="company_type_id" class="form-control">
                                    @foreach($companyTypes as $companyType)
                                        <option value="{{$companyType->id}}">{{$companyType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block" value="Добавить">
                            </div>
                        </form>
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