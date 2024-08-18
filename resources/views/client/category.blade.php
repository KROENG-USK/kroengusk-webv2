<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Category Page | KROENG | UNIVERSITAS SYIAH KUALA</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/kroengusk-icon.png') }}">
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ asset('assets/css/modern-business.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar.css') }}">
</head>

<body>

    @include('includes.home.header')

    <div class="container">
        <div class="row" style="margin-top: 1%">

            <div class="col-md-8">
                <br />
                @if($posts->isEmpty())
                    <br /><br />
                    <h5 style="text-align: center; margin-top: auto;">No pages found</h5>
                @else
                    <div class="card cb1 mb-4">
                        <h1 class="card-header">
                            {{ $category->CategoryName }} News
                        </h1>
                    </div>

                    @foreach($posts as $post)
                        <div class="card cb2 mb-4">
                            <div class="card-body">
                                <a href="{{ url('news', ['nid' => $post->id, 'page' => $post->PostUrl]) }}">
                                    <h2 class="card-title">{{ $post->PostTitle }}</h2>
                                </a>
                                <a href="{{ url('news', ['nid' => $post->id, 'page' => $post->PostUrl]) }}" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            @if($post->PostImage)
                                <img class="card-img-top" src="{{ asset('postimages/' . $post->PostImage) }}" alt="{{ $post->PostTitle }}" style="display: block; max-width:500px; height:auto; margin:auto; margin-bottom:30px;">
                            @endif
                            <div class="card-footer text-muted">
                                <p class="card-text" style="color:black;">Posted on {{ $post->PostingDate }}</p>
                            </div>
                        </div>
                        <br />
                    @endforeach

                    <ul class="pagination justify-content-center mb-4">
                        <li class="page-item {{ $pageno <= 1 ? 'disabled' : '' }}">
                            <a href="{{ $pageno <= 1 ? '#' : route('client.category.index', ['catid' => $category->id, 'pageno' => 1]) }}" class="page-link" style="background-color: transparent;">First</a>
                        </li>
                        <li class="page-item {{ $pageno <= 1 ? 'disabled' : '' }}">
                            <a href="{{ $pageno <= 1 ? '#' : route('client.category.index', ['catid' => $category->id, 'pageno' => $pageno - 1]) }}" class="page-link" style="background-color: transparent;">Prev</a>
                        </li>
                        <li class="page-item {{ $pageno >= $total_pages ? 'disabled' : '' }}">
                            <a href="{{ $pageno >= $total_pages ? '#' : route('client.category.index', ['catid' => $category->id, 'pageno' => $pageno + 1]) }}" class="page-link" style="background-color: transparent;">Next</a>
                        </li>
                        <li class="page-item">
                            <a href="{{ route('client.category.index', ['catid' => $category->id, 'pageno' => $total_pages]) }}" class="page-link" style="background-color: transparent;">Last</a>
                        </li>
                    </ul>
                @endif
            </div>

            @include('includes.home.sidebar')
        </div>
    </div>

    @include('includes.home.footer')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
