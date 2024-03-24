<!doctype html>
<html lang="en">
<head>

    {{-- meta info and favicon --}}
    @include('components.meta')

    {{-- title --}}
    <title>Admin portal</title>

    {{-- source --}}
    @include('components.source')

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
@include('components.script')

</html>
