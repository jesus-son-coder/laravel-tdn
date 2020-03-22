<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Best URL Shortener</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="../../public/css/app.css" rel="stylesheet" type="text/css">

    @stack('header.stylesheets')

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





