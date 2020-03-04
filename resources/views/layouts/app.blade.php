<html>
<head>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Cadastro de produtos</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        .navbar{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    @component('component_navbar', ["current" => $current])
    @endcomponent
    <div class="container">
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>

    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    @hasSection('javascript')
        @yield('javascript')
    @endif
</body>
</html>
