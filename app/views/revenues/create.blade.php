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

                            <a class="btn btn-success btn-sm" href="{{ URL::route('revenue.index') }}"><span class="fa fa-chevron-left"></span> Revenues</a>

					</span>
                </header>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'revenue.store', 'class' => 'form-horizontal')) }}




                    <div class="form-group">
                        {{ Form::label('revenue', 'Revenue*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('revenue', '', array('class' => 'form-control', 'placeholder' => 'Revenue')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('month', 'Month', array('class' => 'col-md-2 control-label required')) }}
                        <div class="col-md-4">
                            {{ Form::select('month', $month, '', array('class' => 'form-control', 'id' => 'month')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('year', 'Year', array('class' => 'col-md-2 control-label required')) }}
                        <div class="col-md-4">
                            {{ Form::select('year', $year, '', array('class' => 'form-control', 'id' => 'year')) }}
                        </div>
                    </div>






                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Create Revenue', array('class' => 'btn btn-primary')) }}
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