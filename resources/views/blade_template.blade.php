<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/template.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/@yield('css')">
</head>
<body>
<div class="background">
    <div class="container">
        @yield('main')
    </div>
</div>
</body>
</html>