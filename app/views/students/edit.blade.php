@extends('layouts.default')
@section('content')
    <?php

    $gender = [
            ''      => '--select--',
            'male' => 'Male',
            'female'   => 'Female',
            'other'   => 'Other'
    ];
    ?>
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('student.index') }}"><span class="fa fa-chevron-left"></span> Students</a>

					</span>
                </header>
                <br>
                <div class="panel-body">
                    {{Form::model($student,['route' => ['student.update',$student->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}


                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('first_name', 'First Name*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Student Email*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Student Email','disabled')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('address', 'Address*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Address')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('city', 'City*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'City')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('dob', 'Date of Birth*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('dob', null, array('class' => 'form-control', 'placeholder' => 'Date of Birth','id'=>'dob')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('campaign_id', 'Campaign', array('class' => 'col-md-4 control-label required')) }}
                            <div class="col-md-8">
                                {{ Form::select('campaign_id', $campaigns, null, array('class' => 'form-control', 'id' => 'campaign')) }}
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('last_name', 'Last Name*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('last_name', null, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone', 'Phone*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Phone')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('zipcode', 'Zip Code*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('zipcode', null, array('class' => 'form-control', 'placeholder' => 'Zip Code')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('state', 'State*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('state', null, array('class' => 'form-control', 'placeholder' => 'State')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('gender', 'Gender', array('class' => 'col-md-4 control-label required')) }}
                            <div class="col-md-8">
                                {{ Form::select('gender', $gender, null, array('class' => 'form-control', 'id' => 'gender')) }}
                            </div>
                        </div>

                    </div>



                    <div class="form-group">
                        <div class="col-lg-offset-5 col-lg-6">
                            <br><br>
                            {{ Form::submit('Edit Student', array('class' => 'btn btn-primary')) }}
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
            $("#campaign").select2();


        });



    </script>
@stop