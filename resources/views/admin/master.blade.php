<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ Url('/css/admin.css') }}">
    @yield('styles')
    <title>پنل مدیریت شیپور</title>



</head>
<body>

@include('admin.section.header')
@yield('content')
@include('admin.section.footer')

