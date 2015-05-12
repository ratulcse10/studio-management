@extends('layouts.default')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('permission.index') }}"><span class="fa fa-chevron-left"></span> Permissions</a>

					</span>
                </header>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'permission.store', 'class' => 'form-horizontal')) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Permission Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Role Name')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('display_name', 'Display Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('display_name', null, array('class' => 'form-control', 'placeholder' => 'Display Name')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Create Permission', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop
