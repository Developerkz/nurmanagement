@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel"  style="padding: 10px">
                    <div class="panel-header">
                        <h2>Изменить</h2>
                        <a  class="btn btn-primary btn-sm" href="{{route('template.index')}}">Назад</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('template.update' ,['id'=>$template->id])}}" method="post">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" value="{{$template->name}}" name="name" class="form-control" placeholder="Наименование" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Описание</label>
                                <textarea name="description"  class="form-control" placeholder="Описание" required>{{$template->description}}</textarea>
                            </div>
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Изменить">
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