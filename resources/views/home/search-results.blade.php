<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="{{ asset('css/showpost.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
</head>
<body>
    @include('home.header') <!-- Consistent navigation header -->

    <div class="posts-container">
        <h1 class="title-deg">Search Results</h1> <!-- Title for search results page -->

        @foreach ($posts as $post)
        <div class="post-card">
            <img class="post-image" src="/postimage/{{ $post->image }}" alt="Post Image">
            <div class="post-content">
                <h2 class="post-title">{{ $post->title }}</h2>
                <p class="post-description">{{ $post->description }}</p>
                <div class="post-date">Posted on: {{ $post->created_at->format('M d, Y') }}</div>
            </div>
        </div>
        @endforeach
    </div>

    @include('home.footer') <!-- Consistent footer across all pages -->
</body>
</html>
