<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
    <link href="{{ asset('css/comments.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Comment</h1>
        <form action="{{ route('comment.update', $comment->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Comment:</label>
                <textarea name="content" id="content" rows="5" class="form-control">{{ $comment->content }}</textarea>
            </div>

            <button type="submit" class="btn">Save Changes</button>
        </form>
        <a href="{{ url()->previous() }}" class="btn btn-back">Back</a>
    </div>
</body>
</html>
