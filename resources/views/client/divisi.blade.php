<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Set favicon icon in head -->
    <link rel="shortcut icon" href="{{ asset('kroengusk-icon.png') }}" type="image/png">

    <!-- JavaScript FontAwesome -->
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/modern-business-2.css') }}" rel="stylesheet">

    <title>Divisi {{ $divisi->divisi }} | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>
<body>
    
    @include('includes.home.header')
    <div class="container content">
        <br />
        <div class="row">
            <div class="col-lg-3 col-8">
                <img src="{{ asset('divisi/img-pengurus-divisi/'. $divisi->img_kadiv) }}" alt="ketua divisi kroeng ({{$divisi->divisi}})" class="img-fluid rounded mb-4">
            </div>
    
            <div class="col-lg-6">
                <div class="card cb2">
                    <h5 class="card-header">KETUA DIVISI : {{ $divisi->nama_lengkap }}</h5>
    
                    <div class="card-body">
                        <p class="card-text">
                            {!! $divisi->jobdesk !!}
                        </p>
                    </div>
    
                    <div class="card-body">
                        <a href="{{ asset('divisi/file-anggota/'. $divisi->file_anggota) }}" class="btn btn-success waves-effect waves-light">Anggota Divisi {{ $divisi->divisi }}</a>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    @include('includes.home.footer')
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>