@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{asset("admin/codebase/dhtmlxscheduler_terrace.css?v=20190111")}}" type="text/css" charset="utf-8">
@endsection

@section('content')
    <div class="container-fluid" style="min-height: 100vh">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="panel"  style="padding: 10px;">
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
                                <div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
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
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset("admin/codebase/dhtmlxscheduler.js?v=20190111")}}" type="text/javascript" charset="utf-8"></script>

    <script src="{{asset("admin/codebase/locale/locale_ru.js")}}" charset="utf-8"></script>
    <script src="{{asset("admin/codebase/ext/dhtmlxscheduler_minical.js?v=20190111")}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset("admin/codebase/ext/dhtmlxscheduler_year_view.js")}}" ></script>

    <script type="text/javascript" charset="utf-8">


        function show_minical(){
            if (scheduler.isCalendarVisible())
                scheduler.destroyCalendar();
            else
                scheduler.renderCalendar({
                    position:"dhx_minical_icon",
                    date:scheduler.getState().date,
                    navigation:true,
                    handler:function(date,calendar){
                        scheduler.setCurrentView(date);
                        scheduler.destroyCalendar()
                    }
                });
        }


        $(document).ready(function(){
            $json = '{"data":[{"id":1,"start_date":"2019-05-27 00:00:00","end_date":"2019-05-27 00:00:00","text":"23123"},{"id":2,"start_date":"2019-05-27 00:00:00","end_date":"2019-05-29 00:00:00","text":"3123123123"}]}'
            function init() {
                scheduler.locale.labels.year_tab ="Год";
                scheduler.config.readonly = false;
                scheduler.config.multi_day = true;
                scheduler.config.xml_date="%Y-%m-%d %H:%i";
                scheduler.init('scheduler_here',new Date(),"month");
                let url = '{{route('api.template.details', ['id' => $template->id])}}';
                scheduler.load(url,'json');
            }



            init();
        });


    </script>

@endsection