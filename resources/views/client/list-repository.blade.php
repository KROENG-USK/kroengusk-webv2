<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Set favicon icon in head --}}
    <link rel="shortcut icon" href="{{ asset('assets/kroengusk-icon.png') }}" type="image/png">

    {{-- JavaScript FontAwesome --}}
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    {{-- Bootstrap core CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    @if(isset($query))
        {{-- Custom styles for this template --}}
        <link rel="stylesheet" href="{{ asset('assets/css/modern-business.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/modern-business-2.css') }}">
    @endif

    <title>Repository Projects | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>
<body>
    {{-- Navigation --}}
    @include('includes.home.header')
    
    @if(isset($query))
        {{-- Page content --}}
        <main class="container">
            <div>
                <h1 class="card-text">Repository Projects</h1>
            </div>
            <br/>
            <a href="{{ route('client.add-repository') }}" class="btn btn-success waves-effect waves-light">
                <li class="fa fa-plus"></li> Add Project
            </a>

            <a href="https://github.com" class="btn btn-primary" target="_blank">
                <i class="fab fa-github"></i>
            </a>

            <section class="row">
                <section class="col-sm-15">
                    <br/><br/>
                    <div class="card cb2 table-responsive">
                        <table class="table table-colored table-centered table-inverse m-0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Project</th>
                                    <th>Author</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($query as $key => $item)
                                    <tr>
                                        <td>{{ $item['datetime'] }}</td>
                                        <td>{{ $item['nama_project'] }}</td>
                                        <td>{{ $item['nama_author'] }}</td>
                                        <td>
                                            <a href="{{ $item['link_project'] }}" target="_blank" class="btn btn-success waves-effect waves-light" style="margin-bottom: 14px">Click</a>
                                            &nbsp;
                                            <button type="submit" name="delete-repository" id="delete-repository" data-id="{{ $item['id'] }}" class="btn-delete-repository btn btn-primary waves-effect waves-light" style="margin-bottom: 14px">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" align="center">
                                            <h3 style="color: red">No Record Found</h3>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </section>
        </main>
    @else
        {{-- Page content --}}
        <main class="container">
            <section class="row">
                <br/><br>
                <div class="card cb2 mb-5">
                    <h5 class="card-header">Penambahan Project</h5>

                    <div class="card-body">
                        <p class="card-text">*Pastikan kamu sudah membuat & mempublish program ke git/github dari akun pribadi</p>
                        <p class="card-text">*Bila form dikirim tidak ada notifikasi, harap hubungi pengurus divisi programmer</p>
                    </div>

                    <form action="{{ route('client.store-repository') }}" name="sendData" id="sendData" method="POST" enctype="multipart/form-data" class="account-content">
                        @csrf
                        {{-- Nama Project --}}
                        <div class="card-body">
                            <p class="card-text">Nama Project : </p>
                            <div class="form-group">
                                <textarea name="project_name" id="project_name" cols="30" rows="3" class="form-control" placeholder="Masukan nama proyek kamu" required></textarea>
                            </div>
                        </div>

                        {{-- Nama lengkap --}}
                        <div class="card-body">
                            <p class="card-text">Nama Lengkap : </p>
                            <div class="form-group">
                                <input type="text" name="author_name" id="author_name" class="form-control" placeholder="Masukan nama kamu" required>
                            </div>
                        </div>

                        {{-- Link Git --}}
                        <div class="card-body">
                            <p class="card-text">Link Git : </p>
                            <img src="{{ asset('assets/images/example-git.png') }}" alt="example-git">
                            <div class="form-group">
                                <br/>
                                <textarea name="link_git" id="link_git" cols="30" rows="3" class="form-control" placeholder="Masukan Link Git (Jangan lupa awal link https://)" required>https://</textarea>
                            </div>
                        </div>

                        <div class="card-body">
                            <button type="submit" name="addRepository" id="addRepository" class="btn btn-primary">Tambahkan</button>
                            <a href="{{ route('client.list-repository.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </form>

                    <div class="clearfix"></div>
                </div>
            </section>
        </main>
    @endif
    
    <br /><br /><br /><br />
    @include('includes.home.footer')

    {{-- Bootstrap core JavaScript --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- SweetAlert JavaScript --}}
    <script src="{{ asset('vendor/bootstrap/js/sweetalert.min.js') }}"></script>
    <script>
        document.querySelectorAll('.btn-delete-repository').forEach(button => {
            button.addEventListener('click', function() {
                let itemId = this.getAttribute('data-id');
                let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch("{{ route('client.delete-repository') }}", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        id: itemId
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        swal({
                            title: "Gagal",
                            text: "Sepertinya ada kesalahan hapus data, silahkan coba kembali",
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
                                text: "Data sudah dihapus",
                                icon: "success"
                            }).then(_ => location.reload());
                        }
                        else {
                            swal({
                                title: "Gagal",
                                text: "Sepertinya ada kesalahan hapus data, silahkan coba kembali",
                                icon: "error"
                            });
                            console.error(`Error ${data.error}`);
                        }
                    } catch (error) {
                        swal({
                            title: "Oops!",
                            text: "Something went wrong, please try again",
                            icon: "error"
                        });
                        console.error(`Error ${error}`);
                    }
                });
            });
        });

        document.getElementById('sendData').addEventListener('submit', (event) => {
            event.preventDefault();

            // get form data
            let form = event.target;
            let formData = new FormData(form);
            
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const project_name = document.getElementById('project_name');
            const author_name  = document.getElementById('author_name');
            const link_git     = document.getElementById('link_git');

            const formatJson = JSON.stringify({
                authorname: author_name.value,
                projectname: project_name.value,
                linkgit: link_git.value
            });

            if (valid()) {
                fetch(form.action, {
                    method: form.method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: formatJson
                })
                .then(response => {
                    if (!response.ok) {
                        swal({
                            title: "Gagal",
                            text: "Sepertinya ada kesalahan tambah project, silahkan coba kembali",
                            icon: "error"
                        });
                        throw new Error("Network response was not ok");
                    }
                    return response.text();
                })
                .then(text => {
                    try {
                        const data = JSON.parse(text);
                        if (data.success) {
                            swal({
                                title: "Berhasil",
                                text: "Git berhasil ditambahkan",
                                icon: "success"
                            }).then(_ => {
                                form.reset();
                                location.reload();
                            });
                        }
                        else {
                            swal({
                                title: "Gagal",
                                text: "Sepertinya ada kesalahan tambah project, silahkan coba kembali",
                                icon: "warning"
                            });
                            console.error("Error: " + data.error);
                        }
                    } catch (error) {
                        swal({
                            title: "Oops!",
                            text: "Something went wrong, please try again",
                            icon: "error"
                        });
                        console.error(`Error: ${error}`);
                    }
                });
            }

            function valid() {
                if (project_name.value.trim() === "") {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan nama project",
                        icon: "warning"
                    }).then(_ => project_name.focus());
                    return false;
                }

                if (author_name.value.trim() === "") {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan nama kamu",
                        icon: "warning"
                    }).then(_ => author_name.focus());

                    return false;
                }

                if (link_git.value.trim() === "") {
                    swal({
                        title: "Perhatian!",
                        text: "Masukan Link Git",
                        icon: "warning"
                    }).then(_ => link_git.focus());

                    return false;
                }
                return true;
            }

        });
        
    </script>
</body>
</html>