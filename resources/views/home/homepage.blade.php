<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/showpost.css') }}">
    <script src="https://kit.fontawesome.com/4faee3e2a3.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('sweetalert::alert')
    @include('home.header')

    <div class="services_section layout_padding">
        <div class="container">
            <h1 class="services_taital" id="posts">
                Blog posts   
                @if (auth()->check() && Auth()->user()->status == 'deactive')
                / <p style="color:red;"> Deactive </p>
                @endif
            </h1>
            <div class="services_section_2">
                <div class="row">
                    @foreach ($post as $posts)
                    <div class="col-md-4">
                        <div class="post-card">
                            <a href="{{ url('post/details', $posts->id) }}" class="post-image-link">
                                <img src="/postimage/{{ $posts->image }}" class="post-image" alt="Post Image">
                            </a>
                            <div class="post-content">
                                <h2 class="post-title">{{ $posts->title }} 
                                    @if(auth()->check() && auth()->user()->status == 'active')
                                    <form action="{{ url('post/like', $posts->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="like-btn">
                                            @if(\App\Models\Like::isLiked(auth()->user()->id, $posts->id))
                                            <i class="fa-solid fa-heart"></i>
                                            @else
                                            <i class="fa-regular fa-heart"></i>
                                            @endif
                                        </button>
                                    </form>
                                    @endif
                                </h2>
                                <p>Posted by: <b>{{ $posts->name }}</b></p>
                                <p>Like Count: <span class="like-count">{{ $posts->likes()->count() }}</span></p>
                                <h5>Comments:</h5>
                                <hr>
                                @foreach ($posts->comments as $comment)
                                <div class="comment">
                                    @php
                                    $user = App\Models\User::find($comment->user_id);
                                    @endphp
                                    <p>{{ $comment->content }}</p>
                                    @if ($comment->user_id === auth()->id() && auth()->check() && Auth()->user()->status == 'active')
                                    <a class="btn btn-success" href="{{ route('comment.edit', ['commentId' => $comment->id]) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('comment.delete', ['commentId' => $comment->id]) }}">Delete</a>
                                    @endif
                                    @if ($user)
                                    <p>Comment by {{ $user->name }}</p>
                                    <hr>
                                    @endif
                                </div>
                                @endforeach
                                @if(auth()->check() && Auth()->user()->status == 'active')
                                <form action="{{ route('comment.add', ['postId' => $posts->id]) }}" method="post">
                                    @csrf
                                    <textarea name="content" placeholder="Write your comment here..." class="comment-textarea"></textarea>
                                    <button type="submit" class="btn btn-primary">Add Comment</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{ $post->links('vendor.pagination.default') }}
        </div>
    </div>

    @include('home.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure to delete this comment?",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
</body>
</html>
