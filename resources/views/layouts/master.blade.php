<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel - {{ $title or 'Welcome' }}</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="../../public/css/app.css" rel="stylesheet" type="text/css">

    @stack('header.stylesheets')

    <style>

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 60vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        body .tdn-classroom-01 {
            color: black;
            font-weight: 600;
            padding-bottom: 50px;
        }
    </style>
</head>
<body>

    @include('layouts/partials/_nav', ['age' => 18])

    <div style="text-align: center;width:100%;">
        <h1>Welcome !</h1>
    </div>

    @yield('content')

    <footer>
        @yield('footer')
    </footer>

    @stack('scripts.footer')
</body>
</html>





