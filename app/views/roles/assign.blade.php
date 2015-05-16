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
                    @if(count($users))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Current Role/s</th>

                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>

                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            {{$role->name}}
                                        @endforeach
                                    </td>

                                    <td class="text-center">
                                        <a class="btn btn-xs btn-primary" href="{{ URL::route('role.add', array('user_id' => $user->id)) }}">Assign New Role</a>

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
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
            $('#example').dataTable({

            });

        });
    </script>
@stop