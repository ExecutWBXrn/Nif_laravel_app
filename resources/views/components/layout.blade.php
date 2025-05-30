<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/jquery-3.7.1.min.js','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <title>{{ $title }}</title>
</head>
<body class="font-my-1 bg-welcome">
<div class="grid">
    <div id="preloader" class="fixed top-0 left-0 w-full h-full bg-[#f4f0d4] flex items-center justify-center z-50">
        <div class="loader border-t-4 border-[#845e43] border-solid rounded-full w-12 h-12 animate-spin"></div>
    </div>
    <x-nav-bar />
    {{ $slot }}
    <x-footer />
</div>
</body>
</html>
