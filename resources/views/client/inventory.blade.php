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
    <link rel="stylesheet" href="{{ asset('assets/css/modern-business.css') }}">

    <title>Inventory | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>
<body>
    @include('includes.home.header')
    <main class="container">
        <h1 class="card-text">Inventory Alat/Barang</h1> <br/>

        <section class="row">
            <div class="col-sm-12">
                <div class="card cb2 table-responsive">
                    <table class="table table-colored table-centered table-inverse m-0">
                        <thead>
                            <tr>                                
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Barang Dipinjam</th>
                                <th>Sisa Barang Tersedia</th>
                                <th>Detail</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($query as $key => $item)
                                <tr>
                                    <td><b>{{ $loop->iteration }}.</b></td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->dipinjam }}</td>
                                    <td>{{ $item->jumlah - $item->dipinjam }}</td>
                                    <td>
                                        {{-- <a href="{{ url('documents/Inventory/'. $item->foto_barang) }}" class="btn btn-success waves-effect waves-light" target="_blank">Click</a> --}}
                                        <a href="{{ route('client.view-inventory.index', ['id' => $item->id]) }}" class="btn btn-success waves-effect waves-light">Click</a>
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
            </div>
        </section>
    </main>

    <br/><br/>

    @include('includes.home.footer')

    {{-- Bootstrap core JavaScript --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>