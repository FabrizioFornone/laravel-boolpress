<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links>a {
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="d-flex justify-content-center align-items-center position-relative full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
            </div>
            @endif
        </nav>

    </div>


    <script src="{{ asset('js/vue.js') }}"></script>
</body>

</html>