@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{asset("admin/codebase/dhtmlxscheduler_terrace.css?v=20190111")}}" type="text/css"
          charset="utf-8">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel" style="padding: 10px">
                        <div class="panel-header">
                            <h2>Изменить</h2>
                            <a class="btn btn-primary btn-sm" href="{{route('template.index')}}">Назад</a>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('template.update' ,['id'=>$template->id])}}" method="post">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" value="{{$template->name}}" name="name" class="form-control"
                                           placeholder="Наименование" required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Описание</label>
                                    <textarea name="description" class="form-control" placeholder="Описание"
                                              required>{{$template->description}}</textarea>
                                </div>
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="Изменить">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-header">
                            <h2>
                                Добавить задачу к
                                шаблону: {{$template->name}}
                            </h2>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('task.store')}}" method="post">
                                <div class="form-group">
                                    <label for="name">Наименование</label>
                                    <input type="text" name="name" class="form-control" placeholder="Наименование"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Описание</label>
                                    <textarea name="description" class="form-control" placeholder="Описание"
                                              required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Дата начала</label>
                                    <input type="date" name="start_date" class="form-control" placeholder="Дата начала"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Дата конца</label>
                                    <input type="date" name="end_date" class="form-control" placeholder="Дата конца"
                                           required>
                                </div>
                                <input type="hidden" name="template_id" required value="{{$template->id}}">


                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block" value="Добавить">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel" style="padding: 10px">
                            <div class="panel-header">
                                <h2>Ошибки</h2>
                            </div>
                            <div class="panel-body">

                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#home">Календарь</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu1">Список</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>Календарь</h3>
                        <div class="panel" style="padding: 10px;">
                            <div class="panel-header">
                                <h2>Задачи шаблона <span class="text-muted">{{$template->name}}</span></h2>
                                {{--<a class="btn btn-success btn-sm" href="{{route('template.create')}}">Добавить</a>--}}
                                <a class="btn btn-info btn-sm" href="{{route('template.index')}}">Назад</a>
                            </div>
                            <div class="panel-body" style="height: 80vh">
                                <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
                                    <div class="dhx_cal_navline">
                                        <div class="dhx_cal_prev_button">&nbsp;</div>
                                        <div class="dhx_cal_next_button">&nbsp;</div>
                                        <div class="dhx_cal_today_button"></div>
                                        <div class="dhx_cal_date"></div>
                                        <div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">
                                            &nbsp;
                                        </div>
                                        <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
                                        <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
                                        <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
                                        <div class="dhx_cal_tab" name="year_tab" style="right:280px;"></div>
                                    </div>
                                    <div class="dhx_cal_header">
                                    </div>
                                    <div class="dhx_cal_data">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>Список</h3>
                        <div class="panel" style="padding: 10px;">
                            <div class="panel-header">
                                <h2>Задачи шаблона <span class="text-muted">{{$template->name}}</span></h2>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Наименование</th>
                                        <th>Описание</th>
                                        <th>Дата начала</th>
                                        <th>Дата конца</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($template->tasks as $task)
                                        <tr>
                                            <td>{{$task->id}}</td>
                                            <td>{{$task->name}}</td>
                                            <td>{{$task->description}}</td>
                                            <td>{{$task->numberToDate($task->start_date)}}</td>
                                            <td>{{$task->numberToDate($task->end_date)}}</td>
                                            <td class="d-flex">
                                                <button type="button" class="btn btn-danger btn-xs mr-1"
                                                        data-toggle="modal" data-target="#exampleModal{{$task->id}}">
                                                    Удалить
                                                </button>
                                                <a href="{{route('task.edit' ,['id'=>$task->id ])}}" class="btn-xs btn btn-primary">Изменить</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="post"
                                                                  action="{{route('task.delete', ['id' => $task->id ])}}">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Предупреждение!</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Вы точно хотите удалить?
                                                                    {{csrf_field()}}


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-secondary btn-sm"
                                                                            data-dismiss="modal">Отмена
                                                                    </button>
                                                                    <input type="submit" value="Удалить"
                                                                           class="btn btn-danger btn-sm mr-1">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--                                        <a href="{{route('task.edit' ,['id'=>$task->id ])}}" class="btn-xs btn btn-primary">Изменить</a>--}}
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
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset("admin/codebase/dhtmlxscheduler.js?v=20190111")}}" type="text/javascript"
            charset="utf-8"></script>

    <script src="{{asset("admin/codebase/locale/locale_ru.js")}}" charset="utf-8"></script>
    <script src="{{asset("admin/codebase/ext/dhtmlxscheduler_minical.js?v=20190111")}}" type="text/javascript"
            charset="utf-8"></script>
    <script src="{{asset("admin/codebase/ext/dhtmlxscheduler_year_view.js")}}"></script>

    <script type="text/javascript" charset="utf-8">


        function show_minical() {
            if (scheduler.isCalendarVisible())
                scheduler.destroyCalendar();
            else
                scheduler.renderCalendar({
                    position: "dhx_minical_icon",
                    date: scheduler.getState().date,
                    navigation: true,
                    handler: function (date, calendar) {
                        scheduler.setCurrentView(date);
                        scheduler.destroyCalendar()
                    }
                });
        }


        $(document).ready(function () {
            $json = '{"data":[{"id":1,"start_date":"2019-05-27 00:00:00","end_date":"2019-05-27 00:00:00","text":"23123"},{"id":2,"start_date":"2019-05-27 00:00:00","end_date":"2019-05-29 00:00:00","text":"3123123123"}]}'

            function init() {
                scheduler.locale.labels.year_tab = "Год";
                scheduler.config.readonly = false;
                scheduler.config.multi_day = true;
                scheduler.config.xml_date = "%Y-%m-%d %H:%i";
                scheduler.init('scheduler_here', new Date(), "month");
                let url = '{{route('api.template.details', ['id' => $template->id])}}';
                scheduler.load(url, 'json');
            }


            init();
        });


    </script>

@endsection