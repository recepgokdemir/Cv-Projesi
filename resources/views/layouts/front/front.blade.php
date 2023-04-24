<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield("title")
    </title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/front/vendors/@fortawesome/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/front/css/live-resume.css")}}">

    {!! htmlScriptTagJsApi() !!}

    @yield("style")
</head>

<body>
@include("layouts.front.header")
<div class="content-wrapper">
@include("layouts.front.sidebar")
    <main>
@yield("content")

@include("layouts.front.footer")
    </main>
</div>
<script src="{{ asset("assets/front/vendors/jquery/dist/jquery.min.js")}}"></script>
<script src="{{ asset("assets/front/vendors/@popperjs/core/dist/umd/popper-base.min.js")}}"></script>
<script src="{{ asset("assets/front/vendors/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<script src="{{ asset("assets/front/js/live-resume.js")}}"></script>
@yield("js")
</body>
</html>
