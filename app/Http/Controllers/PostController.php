<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use \RealRashid\SweetAlert\Facades\Alert;
use App\Models\Like;


class PostController extends Controller
{
    public function post_details($id)
    {
        $post = Post::find($id);
        return view('home.postdetails', compact('post'));
    }

    public function createPost()
    {
        if(Auth()->user()->status == 'deactive'){
            Alert::error('error,Deactivated users cannot add posts');
            return redirect('home');
        }
        else{
            return view('home.createpost');
        }
    }

    public function createData(Request $request)
    {
        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $userid;
        $post->name = $name;
        $post->usertype = $usertype;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }
        $post->save();

        Alert::success('Congrats', 'You have added the data successfully');
        return redirect('home');
    }
    public function fetch_posts()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Post::where('user_id', '=', $userid)->orderBy('created_at', 'desc')->paginate(10);
        return view('home.myposts', compact('data'));
    }
    public function my_post_del($id)
    {
        $data = Post::find($id);
        $data->delete();
        Alert::success('Congrats', 'delete successfully');
        return redirect('/post/fetch_posts');
    }
    public function my_post_edit($id)
    {

        $data = Post::find($id);

        return view('home.editPage', compact('data'));
    }

    public function my_post_update($id, Request $request)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();
        Alert::success('Congrats', 'You have updated the post successfully');
        return redirect('/post/fetch_posts');
    }
    
    public function like_post(Request $request, $postId)
    {
        $userId = auth()->id();
        
       
        $existingLike = Like::where('user_id', $userId)->where('post_id', $postId)->first();
        
        if ($existingLike) {
            
            $existingLike->delete();
            $action = 'unliked';
        } else {
            
            $like = new Like();
            $like->user_id = $userId;
            $like->post_id = $postId;
            $like->save();
            $action = 'liked';
        }
        
       
        return redirect()->route('home');
    }
    public function sort(Request $request)
{
    $sortBy = $request->input('sort_by');

    if ($sortBy === 'date') {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
    }
    elseif ($sortBy === 'likes') {
        $posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->paginate(10);
    }
    elseif ($sortBy === 'user') {
        $posts = Post::orderBy('user_id')->paginate(10);
    }

    return view('home.sort-results', compact('posts','sortBy'));
}
public function search(Request $request)
{
    $keyword = $request->input('keyword');  

    $posts = Post::query()
                 ->where('title', 'ILIKE', "%{$keyword}%")  
                 ->orWhere('description', 'ILIKE', "%{$keyword}%")  
                 ->paginate(10);

    return view('home.search-results', compact('posts', 'keyword'));
}

}

