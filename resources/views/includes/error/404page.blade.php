<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Set favicon icon in head -->
    <link rel="shortcut icon" href="{{ asset('assets/kroengusk-icon.png') }}" type="image/png">

    <!-- JavaScript FontAwesome -->
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Custom style for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/modern-business.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar.css')}}">

    <title>Not Found | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>

<body>
    @include('includes.home.header')
    <div class="container">
        <div class="row" style="margin-top: 1%">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <br/><br/>

                <!-- Blog Post -->
                <div>
                    <br/>
                    <h5 style="text-align: center; margin-top: auto;">404 | NOT FOUND</h5>
                </div>
            </div>

            @include('includes.home.sidebar')
        </div>
    </div>

    @include('includes.home.footer')

    <script src="{{ asset('assets/calendar/app.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>