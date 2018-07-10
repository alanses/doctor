@extends('layouts.admin')
@section('title', 'Edit Page Title')

@section('css')

    <link href="{{ asset('/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/plugins/switchery/switchery.css') }}" rel="stylesheet">

    @parent

@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Редагувати працівка: {{$data->name}}</h2>
            <ol class="breadcrumb">
                <li>
                    {{ link_to_route('admin.index', 'Головна') }}
                </li>
                <li>
                    {{ link_to_route('workers.index', 'Працівники') }}
                </li>
                <li class="active">
                    <strong>Редагувати працівника</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        {{ Form::model($data, ['route' => ['workers.update', $data->idWorker], 'method' =>'PUT' ]) }}
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Common</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <label class="control-label">Імя</label>
                            <div class="">
                                {!! Form::text('name', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Прізвище</label>
                            <div class="">
                                {!! Form::text('second_name', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Побатькові</label>
                            <div class="">
                                {!! Form::text('last_name', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Емейл</label>
                            <div class="">
                                {!! Form::text('email', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Номер паспорта</label>
                            <div class="">
                                {!! Form::text('passport_id', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Пароль для входу</label>
                            <div class="">
                                {!! Form::text('password', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Фотограція</label>
                            <div class="">
                                {!! Form::file('image', array('class' => 'image')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="form-group">
                        <label for="selectDepartment">Назва департамета</label>
                        <select class="form-control" id="selectDepartment" name="department_id">
                            @foreach($departments as $department)
                                <option selected value="{{$data->departmentsId}}">{{$data->departmentAddress}}</option>
                                <option value="{{$department->id}}">{{$department->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectDepartment">Посада</label>
                        <select class="form-control" id="selectPosition" name="position_id">
                            @foreach($position_helds as $position_held)
                                <option selected value="{{$data->positionHeldsId}}">{{$data->positionWorker}}</option>
                                <option value="{{$position_held->id}}">{{$position_held->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectSpecialization">Спеціалізація</label>
                        <select class="form-control" id="selectPosition" name="specialization_id">
                            @foreach($specializations as $specialization)
                                <option selected value="{{$data->specializationId}}">{{$data->specializationWorker}}</option>
                                <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {!! Form::submit('Обновити', array('class'=>'btn btn-primary dim')) !!}
        {!! Form::close() !!}
    </div>

@endsection

@section('javascript')
    @parent
    <!-- Switchery -->
    <script src="/js/plugins/switchery/switchery.js"></script>


    <script>
        $(document).ready(function () {


            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, {color: '#1AB394', secondaryColor: "#ED5565"});

        });
    </script>
@endsection