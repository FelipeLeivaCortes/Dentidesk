<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <section>
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
            <script src="{{ asset('js/swal.min.js') }}"></script>

            @yield('js')
        </section>
    </head>

    <body class="antialiased">
        <!-- Logo & Navbar -->
        <section class="bg-menu">
            <div class="row">
                <div class="col-3 d-flex align-content-right mt-2">
                    <img src="{{asset('/img/logo.png')}}" alt="Logo Página">
                </div>

                <div class="col d-flex justify-content-end">
                    <nav class="navbar navbar-dark bg-primary">
                        <a class="navbar-brand" aria-current="page" href="{{route('home')}}">
                            <strong>Inicio</strong>
                        </a>
                        <a class="navbar-brand" href="{{route('transactions.index')}}">
                            <strong>Resumen</strong>
                        </a>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Content Section -->
        <section>
            <div class="container mt-5">
                @yield('content')
            </div>
        </section>

        <!-- Footer Section -->
        <section>
        </section>
    </body>
</html>
