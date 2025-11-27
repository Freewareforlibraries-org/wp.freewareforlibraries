<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Wireless Printing Hub') }}</title>

        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/hover.css') }}" rel="stylesheet">
        <!-- Scripts -->
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script>
            function onSubmit(token) {
                document.getElementById("printForm").submit();
            }
        </script>
    </head>
    <body class="">
        <div class="d-flex flex-column min-vh-100">
            <div>
                <nav class="navbar navbar-expand-lg bg-teal-light shadow">
                    <div class="container-fluid pt-1 pb-1">
                      <a class="navbar-brand text-teal-dark fw-bolder" href="/">Wireless Printing Hub</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                          <li class="nav-item me-2">
                            <a class="nav-link text-teal-dark hvr-grow fw-bolder hvr-hover"  href="/">Print</a>
                          </li>
                          <li class="nav-item me-2">
                            <a class="nav-link text-teal-dark hvr-grow fw-bolder hvr-hover"  href="/register">Register</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-teal-dark hvr-grow fw-bolder hvr-hover"  href="/login">Login</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-teal-dark hvr-grow fw-bolder hvr-hover"  href="/contact">Contact</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
            </div>

            <div class="w-full mt-6 px-6 py-4">
                {{ $slot }}
            </div>
            <footer class="py-3 mt-auto bg-teal-light shadow-footer">
                <ul class="nav justify-content-center">
                  <li class="nav-item "><a href="/" class="nav-link px-2 text-decoration-none text-teal-dark fw-bolder hvr-grow">Print</a></li>
                  <li class="nav-item "><a href="/about" class="nav-link px-2 text-decoration-none text-teal-dark fw-bolder hvr-grow">Register</a></li>
                  <li class="nav-item "><a href="/services" class="nav-link px-2 text-decoration-none text-teal-dark fw-bolder hvr-grow">Login</a></li>
                  <li class="nav-item "><a href="/contact" class="nav-link px-2 text-decoration-none text-teal-dark fw-bolder hvr-grow">Contact</a></li>
                </ul>
                <div class="col-lg-4 offset-lg-4 col-8 offset-2 col-sm-6 offset-sm-3 col-md-4 offset-md-4 border-bottom border-2 border-light pb-3 mb-3"> 
                </div>
                <p class="text-center text-decoration-none text-teal-dark fw-bolder ">© 2024 www.freewareforlibraries.org</p>
              </footer>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
