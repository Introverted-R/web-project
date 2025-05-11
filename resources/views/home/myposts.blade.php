<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- General styles -->
    <link rel="stylesheet" href="{{ asset('css/button.css') }}"> <!-- Button styles -->
    <link rel="stylesheet" href="{{ asset('css/showpost.css') }}"> <!-- Specific styles for posts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
    @include('sweetalert::alert')
    @include('home.header')

    <h1 class="title-deg">My Posts</h1>

    <div class="posts-container">
        @foreach ($data as $datas)
        <div class="post-card">
            <img class="post-image" src="/postimage/{{ $datas->image }}" alt="Post Image">

            <div class="post-content">
                <h2 class="post-title">{{ $datas->title }}</h2>
                <p class="post-description">{{ $datas->description }}</p>
                <p class="post-date">Posted on: {{ $datas->created_at->format('M d, Y') }}</p>
            </div>

            <div class="post-actions">
                @if (Auth()->user()->status == 'active')
                <a class="btn btn-success" href="{{ route('post.edit', $datas->id) }}">Update</a>
                <a class="btn btn-danger" onclick="confirmation(event)" href="{{ route('post.delete', $datas->id) }}">Delete</a>
                @endif
            </div>
        </div>
        <hr>
        @endforeach
    </div>

    @include('home.footer')

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you sure to Delete this post",
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
