<!doctype html>
<html lang="en">
<head>

    {{-- meta info and favicon --}}
    @include('components.meta')

    {{-- title --}}
    <title>Front portal</title>

    {{-- source --}}
    @include('components.source')

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
@include('components.script')

</html>
