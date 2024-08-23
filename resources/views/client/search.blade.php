<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Set favicon icon in head -->
    <link rel="shortcut icon" href="{{ asset('assets/kroengusk-icon.png') }}" type="image/png">

    <!-- JavaScript FontAwesome -->
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/calendar.css') }}">

    @if($pageno == 0)
        <link rel="stylesheet" href="{{ asset('assets/css/modern-business-2.css') }}">
    @elseif($pageno <= $total_pages && $posts->contains(fn($post) => !empty($post->PostImage)))
        <link rel="stylesheet" href="{{ asset('assets/css/modern-business.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/modern-business-2.css') }}">
    @endif

    <title>Search Page {{ $searchTitle }} | KROENG | UNIVERSITAS SYIAH KUALA</title>
</head>
<body>
    <!-- Navigation -->
    @include('includes.home.header')

    <!-- Page Content -->
    <div class="container">
        <div class="row" style="margin-top: 1%">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <br/><br/>

                <!-- Blog Post -->
                @if($posts->isEmpty())
                    <h5 style="text-align: center; margin-top: auto;">No record found</h5>
                @else
                    @foreach ($posts as $post)
                        <div class="card cb2 mb-4">
                            <div class="card-body">
                                <a href="{{ route('client.news.show', ['nid' => $post->id, 'page' => $post->PostUrl]) }}">
                                    <h2 class="card-title">{{ $post->PostTitle }}</h2>
                                </a>
                                <a href="{{ route('client.news.show', ['nid' => $post->id, 'page' => $post->PostUrl]) }}" class="btn btn-primary">
                                    Read More &rarr;
                                </a>
                            </div>
                            @if($post->PostImage)
                                <img src="{{ asset('postimages/'. $post->PostImage) }}" alt="{{ $post->PostImage }}" class="postimage card-img-top">
                            @endif

                            <div class="card-footer text-muted">
                                <p class="card-text" style="color: black">Posted on {{ $post->PostingDate }}</p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <ul class="pagination justify-content-center mb-4">
                        <li class="page-item {{ $pageno <= 1 ? 'disabled' : '' }}">
                            <a href="{{ $pageno > 1 ? route('client.search.index', ['searchtitle'=> $searchTitle,'pageno' => $pageno - 1]) : '#' }}" class="page-link" style="background-color: transparent">Prev</a>
                        </li>
                        <li class="page-item {{ $pageno >= $total_pages ? 'disabled' : '' }}">
                            <a href="{{ $pageno < $total_pages ? route('client.search.index', ['searchtitle' => $searchTitle, 'pageno' => $pageno + 1]) : '#' }}" class="page-link" style="background-color: transparent">Next</a>
                        </li>
                        <li class="page-item {{ $pageno <= 1 ? 'disabled' : '' }}">
                            <a href="{{ route('client.search.index', ['searchtitle' => $searchTitle, 'pageno' => 1]) }}" class="page-link" style="background-color: transparent">First</a>
                        </li>
                        <li class="page-item {{ $pageno >= $total_pages ? 'disabled' : '' }}">
                            <a href="{{ route('client.search.index', ['searchtitle' => $searchTitle, 'pageno' => $total_pages]) }}" class="page-link" style="background-color: transparent">Last</a>
                        </li>
                    </ul>

                @endif
            </div>
        </div>        
    </div>

    @include('includes.home.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
</body>
</html>
