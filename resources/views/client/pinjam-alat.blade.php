<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Set favicon icon in head --}}
    <link rel="shortcut icon" href="{{ asset('assets/kroengusk-icon.png') }}" type="image/png">

    {{-- JavaScript FontAwesome --}}
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    {{-- Bootstrap core CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    {{-- Custom styles for this template --}}
    <link rel="stylesheet" href="{{ asset('assets/css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modern-business.css') }}">

    <title>Peminjaman Alat Kroeng | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>
<body>
    @include('includes.home.header')
    <main class="container">
        <section class="row centered-content">
            {{-- Blog Entries Column --}}
            <div class="col-sm-10">
                <br/><br/>
                {{-- Blog Post --}}
                <div class="card cb2 mb-5">
                    <h5 class="card-header">Peminjam Alat Kroeng Digital</h5>

                    <div class="card-body">
                        <p class="card-text">Silahkan cek terlebih dahulu persediaan barang yang ingin dipinjam <a href="{{ route('client.inventory.index') }}">Klik disini</a></p>
                        <p class="card-text">*Jika ingin mengembalikan alat, harap hubungi pengurus KROENG</p>
                        <p class="card-text">*Bila form di kirim tidak ada notifikasi, harap hubungi pengurus divisi programmer</p>
                    </div>

                    <form name="postform" id="postform" class="account-content" action="{{ route('client.pinjam-alat.post') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        {{-- Nama lengkap --}}
                        <div class="card-body">
                            <p class="card-text">Nama Lengkap : </p>
                            <div class="form-group">
                                <input type="text" name="fullname" id="fullname" class="form-control cb1" placeholder="Enter your Full Name" required>
                            </div>
                        </div>

                        {{-- ID Number --}}
                        <div class="card-body">
                            <p class="card-text">NIM : </p>
                            <div class="form-group">
                                <input type="number" name="IDnumber" id="IDnumber" class="form-control cb1" placeholder="Enter your ID Number" required></div>
                        </div>

                        {{-- No HP --}}
                        <div class="card-body">
                            <p class="card-text">Nomor HP : </p>
                            <div class="form-group">
                                <input type="number" name="numberphone" id="numberphone" class="form-control cb1" placeholder="Enter your mobile number" required>
                            </div>
                        </div>

                        {{-- Alat yang dipinjam --}}
                        <div class="card-body">
                            <p class="card-text">Alat yang dipinjam : </p>
                            <div class="form-group">
                                <textarea name="list_alat" id="list_alat" cols="30" rows="3" class="form-control cb1" required></textarea>
                            </div>
                        </div>

                        {{-- Batas waktu --}}
                        <div class="card-body">
                            <div class="form-group">
                                <input type="date" name="batas_waktu" id="batas_waktu" cols="30" row="3" class="form-control cb1" required>
                            </div>
                        </div>

                        {{-- Foto alat --}}
                        <div class="card-body">
                            <p class="card-text">Foto Alat yang dipinjam (1 foto lengkap) : </p>
                            <input type="file" name="file_img" id="file_img" class="form-control cb1" required>
                        </div>

                        {{-- Enter --}}
                        <div class="card-body">
                            <button type="submit" name="send-data" id="send-data" class="btn btn-primary">Kirim Data</button>
                        </div>
                    </form>

                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
    </main>

    @include('includes.home.footer')

    {{-- Bootstrap core JavaScript --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- SweetAlert JavaScript --}}
    <script src="{{ asset('vendor/bootstrap/js/sweetalert.min.js') }}"></script>
    
    <script>
        document.getElementById('postform').addEventListener('submit', event => {
            event.preventDefault();

            // get form data
            let form = event.target;
            let formData = new FormData(form);

            const image_type = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
            let isValidType;

            const full_name      = document.getElementById('fullname');
            const id_number      = document.getElementById('IDnumber');
            const number_phone   = document.getElementById('numberphone');
            const nama_alat      = document.getElementById('list_alat');
            const bataswaktu     = document.getElementById('batas_waktu');
            const fileimg        = document.getElementById('file_img').files[0];

            if (valid()) {
                // perfom the AJAX request
                // start fetch
                fetch(form.action, {
                    method: form.method,
                    headers: {
                        'X-CSRF-TOKEN': formData.get("_token")
                    },
                    body: formData
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
                                text: `Jangan lupa kembalikan alat tepat waktunya\n(${bataswaktu.value})`,
                                icon: "success"
                            }).then(_ => {
                                form.reset();
                                location.reload();
                            });
                        }
                        else {
                            swal({
                                title: "Gagal",
                                text: "Sepertinya ada kesalahan kirim data, silahkan coba kembali",
                                icon: "warning"
                            });
                            console.log("Error: " + data.error);
                        }
                    } catch (error) {
                        swal({
                            title: "Oops!",
                            text: "Something went wrong, please try again",
                            icon: "error"
                        });
                        console.error("Error: " + error);
                    }
                });
            }

            function valid() {
                if (full_name.value.trim() === "") {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan nama lengkap",
                        icon: "warning"
                    }).then(_ => full_name.focus());

                    return false;
                }

                if (id_number.value.length === 0 || id_number.value.trim() === "") {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan NIM/NPM",
                        icon: "warning"
                    }).then(_ => id_number.focus());
                    
                    return false;
                }

                if (number_phone.value.length < 10) {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan nomor handphone",
                        icon: "warning"
                    }).then(_ => number_phone.focus());

                    return false;
                }

                if (nama_alat.value.trim() === "") {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan nama alat yang dipinjam",
                        icon: "warning"
                    }).then(_ => nama_alat.focus());
                    
                    return false;
                }

                if (bataswaktu.value.trim() === "") {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan batas waktu yang dipinjam",
                        icon: "warning"
                    }).then(_ => bataswaktu.focus());

                    return false;
                }

                if (!fileimg) {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan foto barang yang dipinjam",
                        icon: "warning"
                    });

                    return false;
                }

                if (fileimg && !image_type.some(type => type === fileimg.type)) {
                    swal({
                        title: "Perhatian!",
                        text: "Format file tidak valid selain jpg, jpeg, png, dan gif. Silahkan coba kembali",
                        icon: "warning"
                    });

                    return false;
                }

                return true;
            }
        });
    </script>
</body>
</html>