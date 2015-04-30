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

                            <a class="btn btn-success btn-sm" href="{{ URL::route('advtype.index') }}"><span class="fa fa-chevron-left"></span> Advertisement Types</a>

					</span>
                </header>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'advtype.create', 'class' => 'form-horizontal')) }}




                    <div class="form-group">
                        {{ Form::label('name', 'Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Name')) }}
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Create Advertisement Type', array('class' => 'btn btn-primary')) }}
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