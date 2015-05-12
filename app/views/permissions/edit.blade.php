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

                    {{Form::model($permission,['route' => ['permission.update',$permission->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}

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
                            {{ Form::submit('Edit Permission', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop
