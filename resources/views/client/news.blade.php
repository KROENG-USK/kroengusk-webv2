<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ isset($post) ? $post->PostTitle : 'Berita' }} | KROENG | UNIVERSITAS SYIAH KUALA</title>
    
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/kroengusk-icon.png') }}">

    <!-- JavaScript FontAwesome -->
    <script src="https://kit.fontawesome.com/ad0d081d8e.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
    <!-- CSS modern-business.css -->
    <link href="{{ asset('assets/css/modern-business.css') }}" rel="stylesheet">

    <!-- calendar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/calendar.css') }}">
</head>

<body>
    @include('includes.home.header')

    <div class="container">
        <div class="row" style="margin-top: 1%">
            <div class="col-md-8">
                <br /><br />
                @if(isset($post))
                    <!-- Detail Berita -->
                    <div class="card cb2 mb-4">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->PostTitle }}</h2>
                            <p><b>Category: </b> 
                                <a href="{{ route('client.category.index', ['catid' => $post->category->id]) }}">
                                    {{ $post->category->CategoryName }}
                                </a> 
                                | <b>Sub Category: </b> {{ $post->subcategory->Subcategory }}<br> 
                                <b>Diposting pada </b>{{ $post->PostingDate }}
                            </p>
                            <hr />
                            @if($post->PostImage)
                                <img class="img-fluid rounded" src="{{ asset('postimages/' . $post->PostImage) }}" alt="{{ $post->PostTitle }}" style="display: block; max-width: auto; height: auto; margin-bottom: 30px;">
                            @endif
                            <p class="card-text">{!! $post->PostDetails !!}</p>
                        </div>
                        <div class="card-footer text-muted">
                            <p class="card-text" style="color:black;">Editor: {{ $post->PostEditor }}</p>
                        </div>
                    </div>

                    <!-- Comments Selection -->
                    @if($comments->count() > 0)
                        <div class="row" style="margin-top: -8%">
                            <div class="col-md-12">
                                <br /> <br />

                                <div class="card cb2 my-4">
                                    <h5 class="card-header">Comments</h5>
                                    <div class="card-body">
                                        <!-- Comment Display Section -->
                                        @foreach($comments as $comment)

                                        <div class="media mb-4">
                                            <img src="{{ asset('images/usericon.png') }}" class="d-flex mr-3 rounded-circle">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $comment->name }}</h5>
                                                <p>{{ $comment->comment}}</p>

                                                <span style="font-size: 12px">{{ $comment->postingDate }}</span>
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Form Comment -->
                    <div class="card cb1 my-4">
                        <h5 class="card-header">Leave a Comment:</h5>
                        <div class="card-body">
                            <form action="{{ route('client.comments.store') }}" method="POST" id="commentForm">
                                @csrf
                                <input type="hidden" name="postId" id="postId" value="{{ $post->id }}">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control cb2" placeholder="Enter your fullname" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <input type="text" name="email" id="email" class="form-control cb2" placeholder="Enter your valid email" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <textarea type="text" name="comment" id="comment" rows="3" class="form-control cb2" placeholder="Comment" required></textarea>
                                </div>
                                <br />
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                @else
                    <!-- Daftar Berita -->
                    @foreach($posts as $post)
                        <div class="card cb2 mb-4">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <a href="{{ route('client.news.show', ['nid' => $post->id, 'page' => $post->PostUrl]) }}">
                                        {{ $post->PostTitle }}
                                    </a>
                                </h2>
                                <p><b>Category: </b> 
                                    <a href="{{ route('client.category.index', ['catid' => $post->category->id]) }}">
                                        {{ $post->category->CategoryName }}
                                    </a>
                                </p>
                                <br>
                                <a href="{{ route('client.news.show', ['nid' => $post->id, 'page' => $post->PostUrl]) }}" class="btn btn-primary">
                                    Read More &rarr;
                                </a>
                            </div>
                            @if($post->PostImage)
                                <img class="postimage card-img-top" src="{{ asset('postimages/' . $post->PostImage) }}" alt="{{ $post->PostTitle }}">
                            @endif
                            <div class="card-footer text-muted">
                                <p class="card-text" style="color:black;">Diposting pada {{ $post->PostingDate }}</p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <ul class="pagination justify-content-center mb-4">
                        <li class="page-item {{ $pageno <= 1 ? 'disabled' : '' }}">
                            <a href="{{ $pageno > 1 ? route('client.news.index', ['pageno' => $pageno - 1]) : '#' }}" class="page-link" style="background-color: transparent">Prev</a>
                        </li>
                        <li class="page-item {{ $pageno >= $total_pages ? 'disabled' : '' }}">
                            <a href="{{ $pageno < $total_pages ? route('client.news.index', ['pageno' => $pageno + 1]) : '#' }}" class="page-link" style="background-color: transparent">Next</a>
                        </li>
                        <li class="page-item {{ $pageno <= 1 ? 'disabled' : '' }}">
                            <a href="{{ route('client.news.index', ['pageno' => 1]) }}" class="page-link" style="background-color: transparent">First</a>
                        </li>
                        <li class="page-item {{ $pageno >= $total_pages ? 'disabled' : '' }}">
                            <a href="{{ route('client.news.index', ['pageno' => $total_pages]) }}" class="page-link" style="background-color: transparent">Last</a>
                        </li>
                    </ul>
                @endif

            </div>
            @include('includes.home.sidebar')
        </div>
    </div>

    @include('includes.home.footer')
    
    <script src="{{ asset('assets/calendar/app.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/sweetalert.min.js') }}"></script>

    <script>
        document.getElementById('commentForm').addEventListener('submit', (event) => {
            event.preventDefault();

            // Get form data
            let form = event.target;
            let formData = new FormData(form);

            const postId  = document.getElementById('postId');
            const name    = document.getElementById('name');
            const email   = document.getElementById('email');
            const comment = document.getElementById('comment');

            // perform the AJAX request
            fetch(form.action, {
                method: form.method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': formData.get("_token")
                },
                body: JSON.stringify({
                    postId: postId.value,
                    name: name.value,
                    email: email.value,
                    comment: comment.value
                })
            })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(text => {
                console.log("Response text: " + text);
                try {
                    const data = JSON.parse(text);
                    if (data.success) {
                        swal({
                            title: "Comment successfully submit!",
                            text: "Comment will be display after admin review",
                            icon: "success"
                        }).then(() => { 
                            name.value    = "";
                            email.value   = "";
                            comment.value = "";
                            location.reload(); 
                        });
                    }
                    else {
                        swal({
                            title: "Oops!",
                            text: "Something went wrong. Please try again.",
                            icon: "error"
                        });
                        console.error("Error: " + data.error);
                    }
                } catch (error) {
                    console.error("Error: " + error);
                    swal({
                        title: "Oops!",
                        text: "An error occured. Please try again.",
                        icon: "error"
                    });
                }
            })
            .catch(error => {
                console.error("Error: " + error);
                swal({
                    title: "Oops!",
                    text: "An error occured. Please try again.",
                    icon: "error"
                });
            });
        });
    </script>
    
</body>
</html>
