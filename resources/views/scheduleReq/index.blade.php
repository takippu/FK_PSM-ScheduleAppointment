<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('scheduleReq.component.header')
</head>
<body class="bg-light">
    @include('scheduleReq.component.navbar')
    @include('scheduleReq.component.scheduleList')
    
</body>
</html>