<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" media="all" />
    <script src="{{ mix('js/app.js')}}" defer></script>
</head>
<body class="min-h-screen bg-gray-50">
    <x-chat-component phoneNumber="22996160650" />
</body>
</html>
