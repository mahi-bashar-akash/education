<!doctype html>
<html lang="en">
<head>

    @include('components.meta')

    <title>Front portal</title>

    @include('components.source')

    @vite('resources/scss/stylesheet.scss')

    @vite('resources/js/front/app.js')
</head>
<body class="front-portal">
    <div id="app"></div>
</body>

@include('components.script')

</html>
