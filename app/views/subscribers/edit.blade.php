@extends('layouts.default')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('subscriber.index') }}"><span class="fa fa-chevron-left"></span> Users</a>

					</span>
                </header>
                <br>
                <div class="panel-body">
                    {{Form::model($subscriber,['route' => ['subscriber.update',$subscriber->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}



                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('first_name', 'First Name*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('first_name', null, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'User Email*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::email('email', $subscriber->user->email, array('class' => 'form-control', 'placeholder' => 'User Email','disabled')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('address', 'Address*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Address')) }}
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
                            {{ Form::label('gender', 'Gender', array('class' => 'col-md-4 control-label required')) }}
                            <div class="col-md-8">
                                {{ Form::select('gender', $gender, null, array('class' => 'form-control', 'id' => 'gender')) }}
                            </div>
                        </div>

                    </div>



                    <div class="form-group">
                        <div class="col-lg-offset-5 col-lg-6">
                            <br><br>
                            {{ Form::submit('Update User', array('class' => 'btn btn-primary')) }}
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
@stop

@section('script')

    {{ HTML::script('assets/global/plugins/select2/select2.min.js') }}

    <script type="text/javascript">
        $(document).ready(function() {

            $("#gender").select2();


        });



    </script>
@stop