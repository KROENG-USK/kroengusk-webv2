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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/modern-business-2.css') }}">

    <title>STRUKTUR KOMUNITAS | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>

    @include('includes.home.header')

    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3" style="text-align: left">
            STRUKTUR KEPENGURUSAN KOMUNITAS ROBOTIC ELECTRICAL ENGINEERING (KROENG) <br/>
            <small>PERIODE {{ date('Y') }}-{{ date('Y') + 1 }}</small>
        </h1>

        @foreach ($struktur as $item)
            <div class="card cb1">
                <h6 class="card-header">Untuk lebih detailnya, silahkan unduh di 
                    <a href="{{ asset('struktur-komunitas/file/'. $item->file) }}" target="_blank">sini</a>
                </h6>
                <div class="card-body">
                    <img src="{{ asset('struktur-komunitas/image/'. $item->img) }}" 
                        alt="Struktur-Pengurusan-KROENG-Tahun-{{ date('Y') }}" 
                        class="img-fluid rounded mb-4" 
                        style="display: block; margin-left: auto; margin-right: auto;">
                </div>
            </div>
        @endforeach
    </div>

    @include('includes.home.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<body>
    
</body>
</html>