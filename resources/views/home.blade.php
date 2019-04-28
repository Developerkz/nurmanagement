@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-12">
            <div class="panel">
                <div class="panel-header text-center">Главная</div>

                <div class="panel-body">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <section class="content">



            </section>
        </div>
    </div>
</div>
@endsection
