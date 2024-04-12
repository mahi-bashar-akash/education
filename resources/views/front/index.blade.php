<!doctype html>
<html lang="en">
<head>

    {{-- meta --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- favicon --}}
    <link rel="shortcut icon" href="{{asset('/images/favicon.png')}}" type="image/png">

    {{-- title --}}
    <title>Front portal</title>

    {{-- source code jquery --}}
    <script src="{{asset('/source-code/jquery/dist/jquery.min.js')}}" type="application/javascript"></script>

    {{-- source code owl carousel js --}}
    <script src="{{asset('/source-code/owl.carousel/dist/owl.carousel.min.js')}}" type="application/javascript"></script>

    {{-- source code owl carousel css --}}
    <link rel="stylesheet" href="{{asset('/source-code/owl.carousel/dist/assets/owl.carousel.min.css')}}">

    {{-- source code owl carousel default css --}}
    <link rel="stylesheet" href="{{asset('/source-code/owl.carousel/dist/assets/owl.theme.default.min.css')}}">

    {{-- source code flatpickr css --}}
    <link rel="stylesheet" href="{{asset('/source-code/flatpickr/dist/flatpickr.min.css')}}">

    {{-- source code flatpickr js --}}
    <script src="{{asset('/source-code/flatpickr/dist/flatpickr.min.js')}}" type="application/javascript"></script>

    {{-- style sheet --}}
    @vite('resources/scss/stylesheet.scss')

    {{-- front app js --}}
    @vite('resources/js/front/app.js')

</head>

{{-- front portal content --}}
<body class="front-portal scrollbar">
    <div id="app"></div>
</body>

{{-- script --}}
<script>

    window.core = {
        APP_NAME: 'Education.io ',
        APP_URL: '{{env('APP_URL')}}',
        @if(\Illuminate\Support\Facades\Auth::guard('users')->check())
            UserInfo: {!! \Illuminate\Support\Facades\Auth::guard('users')->user() !!},
        @else
            UserInfo: null,
        @endif
    };

</script>

</html>
