<!doctype html>
<html lang="en">
<head>

    @include('components.meta')

    <title>Admin portal</title>

    @vite('resources/scss/stylesheet.scss')

    @vite('resources/js/admin/app.js')
</head>
<body class="admin-portal">
    <div id="app"></div>
</body>

@include('components.script')

</html>
