<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit page</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{asset('css/editPage.css')}}">
</head>
<body>
    @include('sweetalert::alert')

        @include('home.header')
        <h1 class="title-deg">Update Post</h1>
        <form action="{{ route('post.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="form-deg">
            @csrf
            <div class="input-group">
                <label for="title">Post Title:</label>
                <input type="text" id="title" name="title" value="{{ $data->title }}">
            </div>
            <div class="input-group">
                <label for="description">Post Description:</label>
                <textarea id="description" name="description">{{ $data->description }}</textarea>
            </div>
            <div class="input-group">
                <label>Old Image:</label>
                <img src="/postimage/{{ $data->image }}" alt="Old Image" class="post-image">
            </div>
            <div class="input-group">
                <label for="image">Update Old Image:</label>
                <input type="file" id="image" name="image">
            </div>
            <div class="form-actions">
                <a href="{{ url('fetch_posts') }}" class="btn btn-danger">Cancel</a>
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </form>

    <!-- Footer section start -->
    @include('home.footer')
</body>

</html>