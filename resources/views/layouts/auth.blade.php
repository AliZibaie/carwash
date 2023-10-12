<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
        rel="stylesheet" />
    <title>@yield('title')</title>
</head>
<body class="dark:bg-neutral-700">
@yield('content')
</body>
</html>
