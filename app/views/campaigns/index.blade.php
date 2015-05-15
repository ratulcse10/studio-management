@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm btn-new-user" href="{{ URL::route('campaign.create') }}">Add New Campaign</a>

					</span>
                </header>
                <div class="panel-body">
                    @if(count($campaigns))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th>Campaign Name</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Type</th>
                                <th>Total Copy</th>
                                <th>Cost</th>
                                <th>Created By</th>

                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($campaigns as $campaign)
                                <tr>
                                    <td>{{ $campaign->name }}</td>
                                    <td>{{ $campaign->from->toformattedDateString() }}</td>
                                    <td>{{ $campaign->to->toformattedDateString() }}</td>
                                    <td>{{ $campaign->ad->name }}</td>
                                    <td>{{ $campaign->total_copies }}</td>
                                    <td>{{ $campaign->cost }}</td>
                                    <td>{{ $campaign->user->email }}</td>


                                    <td class="text-center">
                                        <a class="btn btn-xs btn-success btn-edit" href="{{ URL::route('campaign.edit', array('id' => $campaign->id)) }}">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{{ $campaign->id }}">Delete</a>

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


    <!-- Modal -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    {{ Form::open(array('route' => array('campaign.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) }}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    {{ Form::submit('Yes, Delete', array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>
            </div>
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

            // delete
            $('.deleteBtn').click(function() {
                var deleteId = $(this).attr('deleteId');
                var url = "<?php echo URL::route('campaign.index'); ?>";
                $(".deleteForm").attr("action", url+'/'+deleteId);
            });
        });
    </script>
@stop