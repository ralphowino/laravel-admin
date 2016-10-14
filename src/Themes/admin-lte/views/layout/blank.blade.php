<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <base href="{{config('app.url')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{url('css/adminLTE.css')}}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition">
@include('laraveladmin::header')

@yield('content')

<!-- jQuery 2.2.3 -->
<script src="{{url('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('js/adminLTE.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
@stack('scripts')
</body>
</html>
