@extends('layouts.default')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('campaign.index') }}"><span class="fa fa-chevron-left"></span> Campaigns</a>

					</span>
                </header>
                <br>
                <div class="panel-body">


                    {{Form::model($campaign,['route' => ['campaign.update',$campaign->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}



                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Campaign Name*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Campaign Name')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('from', 'Launch Date*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('from', null, array('class' => 'form-control', 'placeholder' => 'Launch Date','id'=>'from')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('cost', 'Cost of Ad*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::number('cost', null, array('class' => 'form-control', 'placeholder' => 'Cost of Ad','step'=>"0.01")) }}
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('total_copies', 'Total copies*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::number('total_copies', null, array('class' => 'form-control', 'placeholder' => 'Total copies')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('to', 'End Date*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('to', null, array('class' => 'form-control', 'placeholder' => 'End Date','id'=>'to')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ad_type', 'Type of Ad*', array('class' => 'col-md-4 control-label required')) }}
                            <div class="col-md-8">
                                {{ Form::select('ad_type', $ad_types, null, array('class' => 'form-control', 'id' => 'ad_type')) }}
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-5 col-lg-6">
                            <br><br>
                            {{ Form::submit('Update Campaign', array('class' => 'btn btn-primary')) }}
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

            $("#from").datepicker({
                format: 'yyyy-mm-dd'
            });
            $("#to").datepicker({
                format: 'yyyy-mm-dd'
            });
            $("#ad_type").select2();


        });



    </script>
@stop