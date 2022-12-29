<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('schedule.component.header')
</head>
<body class="bg-light">
    @include('schedule.component.navbar')
    @include('schedule.component.addForm')
    @include('schedule.component.scheduleList')
    
</body>
</html>