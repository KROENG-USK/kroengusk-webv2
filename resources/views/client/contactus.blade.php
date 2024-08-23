<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- set favicon icon in head -->
    <link rel="shortcut icon" href="{{ asset('assets/kroengusk-icon.png') }}" type="image/png">

    <!-- javascript FontAwesome -->
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    <!-- bootstrap core css -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/modern-business.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar.css') }}">

    <title>Contact US | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>
<body>
    @include('includes.home.header')
    <div class="container">
        <div class="row" style="margin: 4%">
            
            <!-- Blog Entries Column -->
            <div class="col-md-8" style="color: black">
                <div class="card-body">
                    <div class="card-text">
                        <h1>Contact Us</h1>
                        <p>
                            <b>Komunitas Robotic Electrical Engineering Universitas Syiah Kuala</b>
                        </p>

                        <p>Email : {{ $contact->email }}</p>
                        <p>Cs    : {{ $contact->cs }}</p>
                    </div>
                </div>
                
                <!-- Blog post -->
                <div class="card cb1 mb-5">
                    <h5 class="card-header">Hubungi kami dengan mengisi form di bawah ini: </h5>
                    <form class="account-content" action="{{ route('client.contact-us.send') }}" 
                        name="submit_data" id="submit_data" method="POST">
                        @csrf
                        <!-- Nama Lengkap -->
                        <div class="card-body">
                            <p class="card-text">Nama Lengkap :</p>
                            <div class="form-group">
                                <input type="text" name="fullname" id="fullname" placeholder="Masukan Nama Lengkap" class="form-control cb2" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="card-body">
                            <p class="card-text">Email :</p>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Masukan Email" class="form-control cb2" required>
                            </div>
                        </div>

                        <!-- No HP -->
                        <div class="card-body">
                            <p class="card-text">Nomor HP :</p>
                            <div class="form-group">
                                <input type="number" name="nohp" id="nohp" placeholder="Masukan Nomor HP" class="form-control cb2" required>
                            </div>
                        </div>

                        <!-- Pesan -->
                        <div class="card-body">
                            <p class="card-text">Pesan :</p>
                            <div class="form-group">
                                <textarea name="message" id="message" placeholder="Masukan Pesan" cols="30" rows="3" class="form-control cb2" required></textarea>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="card-body">
                            <button type="submit" name="enter" id="enter" class="btn btn-primary">Send</button>
                        </div>
                    </form>

                    <div class="clearfix"></div>
                </div>
            </div>

            @include('includes.home.sidebar')
        </div>
    </div>

    @include('includes.home.footer')

    <script src="{{ asset('assets/calendar/app.js') }}"></script>
    <!-- SweetAlert Javascript -->
    <script src="{{ asset('vendor/bootstrap/js/sweetalert.min.js') }}"></script>
    <script>
        let fullname, email, nohp, message;

        document.getElementById('submit_data').addEventListener('submit', (event) => {
            event.preventDefault();

            // get form data
            let form = event.target;
            let formData = new FormData(form);
            
            fullname = document.getElementById('fullname');
            email    = document.getElementById('email');
            nohp     = document.getElementById('nohp');
            message  = document.getElementById('message');

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
                        name: fullname.value,
                        email: email.value,
                        nohp: nohp.value,
                        message: message.value
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        swal({
                            title: "Gagal",
                            text: "Sepertinya ada kesalahan kirim pesan, silahkan coba kembali",
                            icon: "error"
                        });
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(text => {
                    try {
                        const data = JSON.parse(text);
                        if (data.success) {
                            swal({
                                title: "Berhasil",
                                text: "Pesan anda telah dikirim ke admin website kroeng...",
                                icon: "success"
                            }).then(_ => {
                                form.reset();
                                location.reload();
                            });
                        }
                        else {
                            swal({
                                title: "Gagal",
                                text: "Sepertinya ada kesalahan kirim pesan, silahkan coba kembali",
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
        });

        function valid() {
            if (fullname.value.trim() === "") {
                swal({
                    title: "Perhatian",
                    text: "Masukan Nama Lengkap",
                    icon: "warning"
                }).then(_ => fullname.focus());
                return false;
            }

            if (email.value.trim() === "") {
                swal({
                    title: "Perhatian",
                    text: "Masukan Mail yang valid",
                    icon: "warning"
                }).then(_ => email.focus());
                return false;
            }

            if (nohp.value.length < 10) {
                swal({
                    title: "Perhatian",
                    text: "Masukan Nomor HP yang valid",
                    icon: "warning"
                }).then(_ => nohp.focus());
                return false;
            }

            if (message.value.trim() === "") {
                swal({
                    title: "Perhatian",
                    text: "Teks Pesan tidak boleh kosong",
                    icon: "warning"
                }).then(_ => message.focus());
                return false;
            }

            return true;
        }
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>