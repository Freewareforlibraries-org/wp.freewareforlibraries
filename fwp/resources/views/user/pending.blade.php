<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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
    <body class="d-flex flex-column min-vh-100">
     
            @include('layouts.nav')

           
       
               <div class="d-flex container">
          
              
                <div class="mt-4 p-4 col-6 ms-auto me-auto shadow bg-light">
                    <h1>Pending Approval</h1>
                    <p>Your account is being approved soon!</p>
                    <div class="d-flex">
                    <button class="btn bg-teal-dark text-white ms-auto me-2" onClick="window.location.reload();">Refresh Page</button>
                    </div>

                </div>   
               
               </div>
           
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       
    </body>
</html>
