@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('student.index') }}"><span class="fa fa-chevron-left"></span> Students</a>

					</span>
                </header>
                <div class="panel-body">

                    <div class="col-md-12">
                        <div class="portlet box red-flamingo">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-user"></i>Student Enrollment
                                </div>
                                <div class="tools">
                                    <a href="#portlet-config" data-toggle="modal" class="config">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <canvas id="studentEnrollment" width="900" height="400"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-user"></i>Students by Age
                                </div>
                                <div class="tools">
                                    <a href="#portlet-config" data-toggle="modal" class="config">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <canvas id="studentAge" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>


                    <div class="col-md-6">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-user"></i>Students by City
                                </div>
                                <div class="tools">
                                    <a href="#portlet-config" data-toggle="modal" class="config">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <canvas id="studentCity" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>
    </div>

@stop


@section('style')

@stop


@section('script')
    {{ HTML::script('assets/admin/pages/scripts/Chart.min.js') }}


    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            var studentEnrollment = $("#studentEnrollment").get(0).getContext("2d");
            var studentAge = $("#studentAge").get(0).getContext("2d");
            var studentCity = $("#studentCity").get(0).getContext("2d");

            var studentGraphURLCity = "<?php echo URL::route('student.graph.city'); ?>";
            var studentGraphURLAge = "<?php echo URL::route('student.graph.age'); ?>";

            var studentCityData = [];
            $.getJSON(studentGraphURLCity)

                    .done(function(data) {
                        $.each(data, function(i, item) {
                            //console.log(item);
                            var creator = {
                                value : item.value,
                                label : item.city,
                                color : 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')',
                                highlight : 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')'
                            };

                            studentCityData.push(creator);

                        });

                        var studentCityChart = new Chart(studentCity).Pie(studentCityData, {segmentShowStroke : true});
                    })

                    .fail(function() {
                        console.log('Oh no, something went wrong!');
                        $('#studentCity').replaceWith('<h2>Oh no, something went wrong!</h2>');

                    });



            //Age Graph Data

            var studentAgeData = [];
            $.getJSON(studentGraphURLAge)

                    .done(function(data) {
                        $.each(data, function(i, item) {
                            //console.log(item);
                            var creator = {
                                value : item.value,
                                label : "Age -"+item.age,
                                color : 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')',
                                highlight : 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')'
                            };

                            studentAgeData.push(creator);

                        });

                        var studentAgeChart = new Chart(studentAge).Pie(studentAgeData, {segmentShowStroke : true});
                    })

                    .fail(function() {
                        console.log('Oh no, something went wrong!');
                        $('#studentAge').replaceWith('<h2>Oh no, something went wrong!</h2>');

                    });


            var studentEnrollmentData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };






            var studentEnrollmentChart = new Chart(studentEnrollment).Line(studentEnrollmentData, {bezierCurve: false});
        });
    </script>


@stop
