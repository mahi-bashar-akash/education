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
    <title>Admin portal</title>

    {{-- source code flatpickr css --}}
    <link rel="stylesheet" href="{{asset('/source-code/flatpickr/dist/flatpickr.min.css')}}">

    {{-- source code flatpickr js --}}
    <script src="{{asset('/source-code/flatpickr/dist/flatpickr.min.js')}}" type="application/javascript"></script>

    {{-- style sheet --}}
    @vite('resources/scss/stylesheet.scss')

    {{-- admin app js --}}
    @vite('resources/js/admin/app.js')

</head>

{{-- admin portal content --}}
<body class="admin-portal">
    <div id="app"></div>
</body>

{{-- script --}}
<script>
    window.core = {
        APP_NAME: 'Education.io ',
        APP_URL: '{{env('APP_URL')}}',
    }
</script>

</html>
