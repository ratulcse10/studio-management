@extends('layouts.default')
@section('content')
    <?php

   
    ?>
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('studioclass.index') }}"><span class="fa fa-chevron-left"></span> Classes</a>

					</span>
                </header>
                <div class="panel-body">
                    {{Form::model($class,['route' => ['studioclass.update',$class->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}


                    <div class="form-group">
                        {{ Form::label('name', 'Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('start_time', 'Start Time*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::input('time','start_time', null, array('class' => 'form-control', 'placeholder' => 'Start Time')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('room', 'Room*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('room', null, array('class' => 'form-control', 'placeholder' => 'Room')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('day', 'Day*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('day',$day, null, array('class' => 'form-control', 'placeholder' => 'Day')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('instructor', 'Instructor*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('instructor', null, array('class' => 'form-control', 'placeholder' => 'Instructor')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('status', 'Status*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::select('status', $status, null, array('class' => 'form-control', 'placeholder' => 'Status')) }}
                        </div>
                    </div>






                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Edit Class', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop

@section('style')
    {{ HTML::style('assets/global/plugins/select2/select2.css') }}
    {{ HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker.css') }}
@stop

@section('script')


    {{ HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
    {{ HTML::script('assets/global/plugins/select2/select2.min.js') }}

    <script type="text/javascript">
        $(document).ready(function() {

            $("#dob").datepicker({
                format: 'yyyy-mm-dd'
            });
            $("#gender").select2();


        });



    </script>
@stop