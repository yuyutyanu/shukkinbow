<html>
<head>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Yantramanav:100" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/template.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/@yield('css')">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
</head>
<body>
<div class="background">
    <div class="container">
        @yield('main')
    </div>
</div>
</body>
</html>