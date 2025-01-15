<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <!-- Set favicon icon in head -->
    <link rel="shortcut icon" href="{{ asset('assets/kroengusk-icon.png') }}" type="image/png">

    <!-- JavaScript FontAwesome -->
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/modern-business.css') }}">
    
    <title>Pengembalian Alat KROENG | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>
<body>
    @include('includes.home.header')
    <main class="container">
        <section class="row centered-content">
            <h1 class="card-text">Pengembalian Alat Kroeng</h1>
            <br />
            <div class="col-sm-10">
                <br/><br/>
                <div class="card cb2 table-responsive">
                    <table class="table table-colored table-centered table-inverse m-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Dipinjam</th>
                                <th>Alat Dipinjam</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($query as $key => $pinjam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pinjam->NamaLengkap }}</td>
                                    <td>{{ $pinjam->Tanggal }}</td>
                                    <td>{{ $pinjam->ListAlat }}</td>
                                    <td>
                                        <a href="{{ url('/dokumen/pengembalian-alat/view-data/'. $pinjam->id) }}" 
                                            class="btn btn-success waves-effect waves-light"
                                            style="margin: 14px">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" align="center">
                                        <h3 style="color:red">No Record Found</h3>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <br/><br/><br/>

    @include('includes.home.footer')
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>