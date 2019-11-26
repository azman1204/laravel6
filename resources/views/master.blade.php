<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="/css/layout.css">
    <title>Laravel 6 Training</title>
</head>
<body>
    <div id="xwrapper">
        <div id="xheader">
            {{ Auth::user()->nama }} {{ Auth::user()->id_pengguna }}
        </div>
        <div id="xmenu"></div>
        <div id="xcontent">@yield('content')</div>
        <div id="xfooter"></div>
    </div>
</body>
</html>