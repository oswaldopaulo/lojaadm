@php use \App\Http\Controllers\ParametrosController @endphp
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Termos</title>
        </head>
        <body>{!! ParametrosController::getParametro('termos') !!}</body>
</html>
