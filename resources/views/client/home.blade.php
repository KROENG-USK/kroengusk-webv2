<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page | KROENG | UNIVERSITAS SYIAH KUALA</title>

    <!-- Set favicon icon in head-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/kroengusk-icon.png') }}">

    <!-- JavaScript FontAwesome -->
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/modern-business.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar.css') }}">
</head>

<body>
    <!-- Navigation -->
    @include('includes.home.header')

    <!-- Page Content-->
    <!-- START IMAGE SLIDER-->
    <div class="container p-4 animate__animated animate__fadeIn">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach($slides as $index => $slide)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach($slides as $index => $slide)
                    @php
                        $imagePath = public_path('assets/images/slide/' . $slide->foto_slide);
                        $imageExists = file_exists($imagePath) && is_file($imagePath);
                        $imageUrl = $imageExists ? asset('assets/images/slide/' . $slide->foto_slide) : asset('assets/images/notfound.png');
                    @endphp
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ $imageUrl }}" class="card cb1 img-thumbnail d-block w-100" alt="{{ $slide->judul_slide }}">
                        <div class="card cb1 carousel-caption d-none d-md-block">
                            <h5>{{ $slide->judul_slide }}</h5>
                            <h4>{{ $slide->subjudul_slide }}</h4>
                            <p class="card-text">{!! $slide->deskripsi !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- END IMAGE SLIDER-->

    <div class="container p4">
        <!-- welcome text -->
        <p class="text-center text-white fw-bolder fs-4 animate__animated animate__fadeInUp">SELAMAT DATANG DI WEBSITE KOMUNITAS ROBOTIC ELECTRICAL ENGINEERING</p>
        <p class="text-center text-white fw-bolder fs-4 animate__animated animate__fadeInUp">UNIVERSITAS SYIAH KUALA</p>

        <!-- Start Introduce -->
        <div class="row" style="margin-top: 4%;">
            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <!-- Blog post -->
                <div class="card cb2 animate__animated animate__fadeInDown">
                    <h5 class="card-header text-center">KROENG</h5>
                    <div class="card-body">
                        <p class="card-text" align="center">{!! $introduction->deskripsi !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Introduce -->
    </div>

    <!-- Other Website Link -->
    <div class="container p-4">
        <div class="col-md-12">
            <div class="card cb2 p-4 animate__animated animate__fadeIn">
                <div class="card-text d-flex align-items-center p-4">
                    <!-- Link Prodi Elektro USK -->
                    <a href="https://elektro.usk.ac.id/"><img src="{{ asset('assets/images/UskLogo.png') }}" alt="" width="96" height="96" class="shadow rounded-circle"></a>
                    <a href="https://elektro.usk.ac.id/" class="fw-bolder link-warning ps-4">Program Studi Teknik Elektro Universitas Syiah Kuala</a>
                </div>

                <div class="card-text d-flex align-items-center p-4">
                    <!-- Link IKATEKTRO USK -->
                    <a href="https://ikatektro.org"><img src="{{ asset('assets/images/IkatektroLogo.png') }}" alt="" width="96" height="96" class="shadow rounded-circle"></a>
                    <a href="https://ikatektro.org/" class="fw-bolder link-warning ps-4">Ikatan Alumni Teknik Elektro Universitas Syiah Kuala</a>
                </div>

                <div class="card-text d-flex align-items-center p-4">
                    <!-- Link HIMATEKTRO USK -->
                    <a href="https://himatektrousk.eu.org/"><img src="{{ asset('assets/images/HimatektroLogo.png') }}" alt="" width="96" height="96" class="shadow rounded-circle"></a>
                    <a href="https://himatektrousk.eu.org/" class="fw-bolder link-warning ps-4">Himpunan Mahasiswa Teknik Elektro Universitas Syiah Kuala</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Address -->
    <div class="container p-4">
        <div class="d-lg-flex align-items-center p-4 animate__animated animate__fadeIn">
            <img src="{{ asset('assets/images/KroengLogoIndex.png') }}" alt="" width="150" height="150" class="shadow rounded-circle me-4">
            <span>
                <p class="lead text-white"><b>Address:<br>Jln. Tgk. Syech Abdurrauf No.7 Kopelma Darussalam, Kecamatan Syiah Kuala, Kota Banda Aceh, Provinsi Aceh, Indonesia 23111<br>Email: {{ $contact->email }}</b></p>
            </span>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.home.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
