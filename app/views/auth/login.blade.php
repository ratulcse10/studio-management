<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    {{ HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
    {{ HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('assets/global/plugins/uniform/css/uniform.default.css') }}
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    {{ HTML::style('assets/admin/pages/css/login2.css') }}
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    {{ HTML::style('assets/global/css/components.css') }}
    {{ HTML::style('assets/global/css/plugins.css') }}
    {{ HTML::style('assets/admin/layout2/css/layout.css') }}
    {{ HTML::style('assets/admin/layout2/css/themes/default.css') }}
    {{ HTML::style('assets/admin/layout2/css/custom.css') }}
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="{{route('dashboard')}}">
        <img src={{asset('assets/images/logo-dark-bg.jpg')}} style="height:7.5em;" alt="Studio Management"/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->


    {{ Form::open(array('route' => 'login', 'method' => 'post', 'class' => 'form-signin')) }}

    <div class="form-title text-center">
        <span class="form-title">Welcome.</span>
        <span class="form-subtitle">log in now</span>
    </div>
    <div class="login-wrap">
        @include('includes.alert')

        <div class="form-group">
            {{ Form::label('email', 'Email', array('class' => 'control-label visible-ie8 visible-ie9')) }}

            {{ Form::email('email', '', array('class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Email')) }}

        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password', array('class' => 'control-label visible-ie8 visible-ie9')) }}

            {{ Form::password('password', array('class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Password')) }}

        </div>



        <div class="form-actions">
            {{ Form::submit('Log in', array('class' => 'btn btn-primary btn-block uppercase')) }}
        </div>
        <label class="checkbox">
            <span class="pull-right">
                <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
            </span>
        </label>

    </div>

    {{ Form::close() }}


    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Forgot Password ?</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    {{ Form::open(array('action' => 'RemindersController@postRemind', 'method' => 'post')) }}

                    {{ Form::email('email', '', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Email Address', 'autocomplete'=>'off')) }}
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>

                    {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <!-- END FORGOT PASSWORD FORM -->

</div>
<div class="copyright hide">
    2014 © Metronic. Admin Dashboard Template.
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{{ HTML::script('assets/global/plugins/respond.min.js') }}
{{ HTML::script('assets/global/plugins/excanvas.min.js') }}
<![endif]-->

{{ HTML::script('assets/global/plugins/jquery.min.js') }}
{{ HTML::script('assets/global/plugins/jquery-migrate.min.js') }}
{{ HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/global/plugins/jquery.blockui.min.js') }}
{{ HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js') }}
{{ HTML::script('assets/global/plugins/jquery.cokie.min.js') }}

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
{{ HTML::script('assets/global/scripts/metronic.js') }}
{{ HTML::script('assets/admin/layout2/scripts/layout.js') }}
{{ HTML::script('assets/admin/layout2/scripts/demo.js') }}
{{ HTML::script('assets/admin/pages/scripts/login.js') }}

<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
        Demo.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>