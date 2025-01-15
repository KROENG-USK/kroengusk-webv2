<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="{{ asset('assets/css/modern-business.css') }}">
    
    <title>Details Peminjam | Pengembalian Alat Kroeng | KROENG | UNIVERSITAS SYIAH KUALA </title>
</head>
<body>
    @include('includes.home.header')
    <main class="container">
        <section class="row centered-content">
            <div class="col-sm-10">
                <br/><br/>
                <div class="card cb2 mb-5">
                    <h5 class="card-header">Pengembalian Alat Kroeng Digital</h5>
                    <div class="card-body">
                        <p class="card-text">*Bila form di kirim tidak ada notifikasi JavaScript, Harap hubungi pegurus divisi Programmer</p>
                    </div>

                    <form class="account-content" action="{{ route('client.store-pengembalian-alat', $dataPinjam->id) }}" 
                        name="storeData" id="storeData" method="POST">
                        @csrf

                        <div class="card-body">
                            <h6 class="m-b-30 m-t-0 header-title"><b>Tanggal Dipinjam</b></h6>
                            <input type="text" class="form-control cb1" value="{{ $dataPinjam->Tanggal }}" readonly>
                            <input type="text" class="form-control cb1" value="{{ $statusBatasWaktu }}" readonly>
                        </div>

                        <div class="card-body">
                            <p class="card-text">Nama Lengkap : </p>
                            <div class="form-group">
                                <input type="text" class="form-control cb1" value="{{ $dataPinjam->NamaLengkap }}" readonly>
                            </div>
                        </div>

                        <div class="card-body">
                            <p class="card-text">Alat yang Dipinjam : </p>
                            <div class="form-group">
                                <textarea name="list-alat-dipinjam" id="list-alat-dipinjam" cols="30" rows="4" class="form-control" readonly>{{ $dataPinjam->ListAlat }}</textarea>
                            </div>
                        </div>

                        <div class="card-body">
                            <p class="card-text">Foto Alat yang dipinjam (1 foto lengkap) : </p>
                            <div>
                                <a href="{{ asset('documents/PinjamAlat/postImages/'. $dataPinjam->PostImage) }}" target="_blank">
                                    <img src="{{ asset('documents/PinjamAlat/postImages/'. $dataPinjam->PostImage) }}" width="160" height="200">
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <p class="card-text">Tanggal Pengembalian : </p>
                            <div class="form-group">
                                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" cols="30" row="3" class="form-control cb1"
                                    placeholder="Masukan tanggal pengembalian alat (kapan alat dikembalikan?)" required>
                            </div>
                        </div>

                        <div class="card-body">
                            <p class="card-text">Dimana Alat dikembalikan? : </p>
                            <div class="form-group">
                                <textarea name="lokasi_alat" id="lokasi_alat" cols="30" rows="3" class="form-control cb1"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="card-body">
                            <button type="submit" class="btn btn-success waves-effect waves-light" name="storeData"
                                id="storeData">Barang Dikembalikan &nbsp;&nbsp;</button>
                            <a href="{{ url('dokumen/pengembalian-alat/') }}" class="btn btn-primary waves-effect waves-light">Kembali</a>
                        </div>
                    </form>

                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
    </main>

    @include('includes.home.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('vendor/bootstrap/js/sweetalert.min.js') }}"></script>

    <script>
        let tanggal_pengembalian, lokasi_alat;

        document.getElementById('storeData').addEventListener('submit', event => {
            event.preventDefault();

            // get form data
            let form = event.target;
            let formData = new FormData(form);

            tanggal_pengembalian = document.getElementById('tanggal_pengembalian');
            lokasi_alat          = document.getElementById('lokasi_alat');

            if (valid()) {
                // perfom the AJAX request
                // start fetch
                fetch(form.action, {
                    method: form.method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': formData.get("_token")
                    },
                    body: JSON.stringify({
                        tanggalPengembalian: tanggal_pengembalian.value,
                        lokasiAlat: lokasi_alat.value
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        swal({
                            title: "Gagal",
                            text: "Sepertinya ada kesalahan kirim data, silahkan coba kembali",
                            icon: "error"
                        });
                    }

                    return response.text();
                })
                .then(text => {
                    console.log("Response text: " + text);
                    try {
                        const data = JSON.parse(text);
                        if (data.success) {
                            swal({
                                title: "Berhasil",
                                text: "Alat KROENG Telah Dikembalikan",
                                icon: "success"
                            }).then(_ => {
                                form.reset();
                                location.href="{{ route('client.list-data-pengembalianalat') }}"
                            });
                        } else {
                            swal({
                                title: "Gagal",
                                text: "Sepertinya ada kesalahan kirim data, silahkan coba kembali",
                                icon: "error"
                            });
                            console.error("Error: " + data.error);
                        }
                    } catch (error) {
                        swal({
                            title: "Oops!",
                            text: "Something went wrong, please try again...",
                            icon: "error"
                        });
                        console.error("Error: " + error);
                    }
                });
            }

            function valid() {
                if (tanggal_pengembalian.value.trim() === "") {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan tanggal pengembalian alat/barangnya",
                        icon: "warning"
                    }).then(_ => tanggal_pengembalian.focus());
                    return false;
                }

                if (lokasi_alat.value.trim() === "") {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan Keterangan lokasi penyerahan alat nya",
                        icon: "warning"
                    }).then(_ => lokasi_alat.focus());
                    return false;
                }

                return true;
            }
        });
    </script>
    
</body>
</html>