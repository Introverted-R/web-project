<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/postdetails.css') }}"> 
    <title>Post Details</title>
</head>
<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
    </div>

    <div class="post-details-container">
        <div class="post-content">
            <div class="post-image-container">
                <img class="post-image" src="/postimage/{{$post->image}}" alt="Post Image">
            </div>
            <div class="post-details">
                <h3 class="post-title"><b>Title: {{$post->title}}</b></h3>
                <h4 class="post-description">Description: {{$post->description}}</h4>
                <p class="post-author">Posted on: <b>{{$post->created_at}}</b></p>
                <div class="btn-group">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success">Update</a>
                    <a href="{{ url('post.delete', $post->id) }}" class="btn btn-danger">Delete</a>
                </div>
                <div class="btn-full-width">
                    <a href="{{ url('home') }}" class="btn btn-primary">Back</a>
                </div>                              
            </div>
        </div>
    </div>
    <!-- footer section start -->
    @include('home.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are you sure to delete this post?",
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
