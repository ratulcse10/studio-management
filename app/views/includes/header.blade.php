<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>{{$title}} | {{Config::get('customConfig.names.siteName')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    {{ HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
    {{ HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('assets/global/plugins/uniform/css/uniform.default.css') }}
    {{ HTML::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    {{ HTML::style('assets/global/css/components.css') }}
    {{ HTML::style('assets/global/css/plugins.css') }}
    {{ HTML::style('assets/admin/layout2/css/layout.css') }}
    {{ HTML::style('assets/admin/layout2/css/themes/grey.css') }}
    {{ HTML::style('assets/admin/layout2/css/custom.css') }}
    <!-- END THEME STYLES -->
    @yield('style')
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->