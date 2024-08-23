<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Set favicon icon in head --}}
    <link rel="shortcut icon" href="{{ asset('assets/kroengusk-icon.png') }}" type="image/png">

    {{-- JavaScript FontAwesome --}}
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    {{-- Bootstrap core CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    {{-- Custom styles for this template --}}
    <link rel="stylesheet" href="{{ asset('assets/css/modern-business-2.css') }}">

    <title>Detail Barang | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>
<body>
    @include('includes.home.header')

    <main class="container">
        <section class="row">
            <div class="col-sm-7">
                <div class="card cb2 table-responsive">
                    <table class="table table-colored table-centered table-inverse m-0">
                        <tbody>
                            <tr>
                                <td>Nama Barang : </td>
                                <td>{{ $dataInventory->nama_barang }}</td>
                            </tr>

                            <tr>
                                <td>Jumlah : </td>
                                <td>{{ $dataInventory->jumlah }}</td>
                            </tr>

                            <tr>
                                <td>Barang Dipinjam : </td>
                                <td>{{ $dataInventory->dipinjam }}</td>
                            </tr>

                            <tr>
                                <td>Sisa Barang Dipinjam : </td>
                                <td>{{ $dataInventory->jumlah - $dataInventory->dipinjam }}</td>
                            </tr>

                            <tr>
                                <td>Foto Barang : </td>
                                <td>
                                    <a href="{{ asset('documents/Inventory/'. $dataInventory->foto_barang) }}" target="_blank">
                                        <img src="{{ asset('documents/Inventory/'. $dataInventory->foto_barang)}}" width="160" height="200">
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>                                
                                    <a href="{{ route('client.inventory.index') }}" class="btn btn-primary waves-effect waves-light">Kembali</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    @include('includes.home.footer')

    {{-- Bootstrap core JavaScript --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>