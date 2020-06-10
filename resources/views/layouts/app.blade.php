<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap core CSS → -->
    <link href="{{ URL::asset ('sass/app.scss') }}" rel="stylesheet">
    <link href="{{ URL::asset ('sass/bootstrap/bootstrap.css') }}" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>公民館等のこれからを考える会</title>
</head>

<body>
    <div>
        <img src="img/hp1.png" class="img-fluid" alt="Responsive image">
    </div>

    <div class="d-flex flex-sm-row flex-column-reverse mb-3" style="background:url('img/hp2.png')">

        @yield('content');
        @include('layouts.category');

    </div>

    @include('layouts.footer');

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset ('js/bootstrap.js') }} "></script>
</body>

</html>
