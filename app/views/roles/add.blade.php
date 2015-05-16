@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('dashboard') }}">Dashboard</a>

					</span>
                </header>
                <div class="panel-body">
                   <h3>User Email : {{$user->email}} </h3>
                    <br/>
                    <h3>Permissions:</h3>
                    {{ Form::open(array('route' => ['role.doAdd',$user->id], 'class' => 'form-horizontal')) }}

                    @foreach($roles as $key => $val)
                    @if(in_array($val, $results))

                            <div class="form-group">

                            <input type="checkbox" name="{{$val}}" value="{{$key}}" checked/>{{$val}} <br />
                            </div>
                    @else
                            <div class="form-group">
                            <input type="checkbox" name="{{$val}}" value="{{$key}}" />{{$val}} <br />
                            </div>
                    @endif
                    @endforeach

                    <div class="form-group">
                        <div>
                            {{ Form::submit('Assign Role', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}

                </div>
            </section>
        </div>
    </div>



@stop


@section('style')
    {{ HTML::style('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
@stop


@section('script')
    {{ HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {


        });
    </script>
@stop