<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ mix('/css/app.css')}}" rel="stylesheet">
<script src="{{ mix('js/app.js')}}"></script>

<title>{{ $title ?? 'つぶやきアプリ'}}</title>
@stack('css')
</head>

<body class="bg-gray-50">
    {{ $slot }}
</html>