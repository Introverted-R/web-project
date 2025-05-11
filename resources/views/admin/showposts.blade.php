@extends('admin.adminhome')

@section('content')
    <h1 style="color:black; text-align: center;">All Posts</h1>
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
    @endif

    @if($post_data->isEmpty())
        <p>No posts available.</p>
    @else
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Post title</th>
                    <th>Description</th>
                    <th>Post by</th>
                    <th>usertype</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post_data as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->usertype }}</td>
                    <td>
                        <img style="height:200px; width:200px;"src="{{ asset('postimage/' . $post->image) }}">
                    </td>
                   
                    <td>
                        <a href="{{ url('post/delete', $post->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
