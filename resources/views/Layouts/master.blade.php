<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="{{ Url('/') }}/css/site.css">



    <title>شیپور</title>
</head>
<body>
@include('Layouts.section.header')
@yield('content')
@include('Layouts.section.footer')