<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search/Sort Results</title>
    <link rel="stylesheet" href="{{ asset('css/showpost.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('home.header') <!-- Navigation header -->

    <div class="posts-container">

        @foreach ($posts as $key => $post)
        
            <!-- Conditional display based on sort type -->
            @if ($sortBy == 'user' && ($key === 0 || $post->user_id !== $posts[$key - 1]->user_id))
                <h2 class="post-title">Posted by: {{ $post->name }}</h2>
            @endif
            <div class="post-card">
            <div>
                <img class="post-image" src="/postimage/{{ $post->image }}" alt="Post Image">
            </div>

            <div class="post-content">
                <div class="post-title">{{ $post->title }}</div>
                <div class="post-description">{{ $post->description }}</div>
                <div class="post-date">Posted on: {{ $post->created_at->format('M d, Y') }}</div>

                @if ($sortBy == 'likes')
                <div class="post-actions">
                    <div>Likes: {{ $post->likes_count }}</div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    @include('home.footer') <!-- Consistent footer across all pages -->
</body>
</html>
