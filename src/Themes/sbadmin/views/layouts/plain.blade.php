<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{config('app.url')}}">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="css/sbadmin.css" rel="stylesheet">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>
<body>
@include('laraveladmin::header')
@yield('content')
<script src="js/app.js"></script>
<script src="js/sbadmin.js"></script>
@stack('scripts')
</body>
</html>
