@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel"  style="padding: 10px;">
                    <div class="panel-header">
                        <h2>Шаблоны</h2>
                        <a class="btn btn-success btn-sm" href="{{route('template.create')}}">Добавить</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Описание</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($templates as $template)
                                <tr>
                                    <td>{{$template->id}}</td>
                                    <td>{{$template->name}}</td>
                                    <td>{{$template->description}}</td>
                                    <td class="d-flex">
                                        <button type="button" class="btn btn-danger btn-xs mr-1" data-toggle="modal" data-target="#exampleModal{{$template->id}}">
                                            <span class="fa fa-trash"></span> Удалить
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$template->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="{{route('template.delete', ['id' => $template->id ])}}">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Предупреждение!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Вы точно хотите удалить?
                                                            {{csrf_field()}}


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Отмена</button>
                                                            <input type="submit" value="Удалить" class="btn btn-danger btn-sm mr-1">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{route('template.edit' ,['id'=>$template->id ])}}" class="btn-xs btn btn-primary"><span class="fa fa-edit"></span> Изменить</a>
                                        <a href="{{route('template.details' ,['id'=>$template->id ])}}" class="btn-xs btn btn-info"><span class="fa fa-tasks"></span> Задачи</a>
                                        <a href="{{route('template.calendar' ,['id'=>$template->id ])}}" class="btn-xs btn btn-warning"><span class="fa fa-calendar"></span> Календарь</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection