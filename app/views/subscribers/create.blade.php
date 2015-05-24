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
                    {{ Form::open(array('route' => 'subscriber.create', 'class' => 'form-horizontal')) }}


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
                                {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'User Email')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('address', 'Address*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'Address')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('gender', 'Gender', array('class' => 'col-md-4 control-label required')) }}
                            <div class="col-md-8">
                                {{ Form::select('gender', $gender, null, array('class' => 'form-control', 'id' => 'gender')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('role_id', 'User Type', array('class' => 'col-md-4 control-label required')) }}
                            <div class="col-md-8">
                                {{ Form::select('role_id', $roles, null, array('class' => 'form-control', 'id' => 'role')) }}
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
                            {{ Form::label('password', 'Password*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('password', '', array('class' => 'form-control', 'placeholder' => 'Password')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone', 'Phone*', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Phone')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('social_security', 'Social Security #', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('social_security', null, array('class' => 'form-control', 'placeholder' => 'Social Security')) }}
                            </div>
                        </div>

                        <div class="form-group" id="paymentTypeDiv">
                            {{ Form::label('payment_type', 'Payment Type', array('class' => 'col-md-4 control-label required')) }}
                            <div class="col-md-8">
                                {{ Form::select('payment_type', $paymentType, null, array('class' => 'form-control', 'id' => 'payment')) }}
                            </div>
                        </div>

                        <div class="form-group" id="paymentCycleDiv">
                            {{ Form::label('payment_cycle', 'Payment Cycle', array('class' => 'col-md-4 control-label required')) }}
                            <div class="col-md-8">
                                {{ Form::select('payment_cycle', $paymentCycle, null, array('class' => 'form-control', 'id' => 'payment_cycle')) }}
                            </div>
                        </div>

                        <div class="form-group" id="paymentAmountDiv">
                            {{ Form::label('payment_amount', 'Payment Amount', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('payment_amount', null, array('class' => 'form-control', 'placeholder' => 'Payment Amount')) }}
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">
                        @foreach($permissions as $key => $val)

                                <div class="form-group">
                                    <input type="checkbox" name="permissions[]" value="{{$key}}" />{{$val}} <br />
                                </div>

                        @endforeach
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-5 col-lg-6">
                            <br><br>
                            {{ Form::submit('Create User', array('class' => 'btn btn-primary')) }}
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
            $("#role").select2();
            $("#payment").select2();
            $("#payment_cycle").select2();
            var paymentType = $("#paymentTypeDiv");
            var paymentCycleDiv =  $("#paymentCycleDiv");
            var paymentAmountDiv =  $("#paymentAmountDiv");
            console.log(paymentAmountDiv);
            paymentCycleDiv.detach();

            $('#payment').on('change', function (e) {
                $("#paymentCycleDiv").detach();
                $("#paymentAmountDiv").detach();
                var optionSelected = $(this).find("option:selected");
                var valueSelected  = optionSelected.val();
                if(valueSelected ==="salary"){

                    paymentCycleDiv.insertAfter( paymentType );
                    paymentAmountDiv.insertAfter( paymentCycleDiv );
                    console.log( paymentCycleDiv[0].className);
                }else if(valueSelected ==="custom"){
                    $("#paymentCycleDiv").detach();
                    $("#paymentAmountDiv").detach();
                }else{
                    $("#paymentCycleDiv").detach();
                    paymentAmountDiv.insertAfter( paymentType );
                }

            });


        });



    </script>
@stop