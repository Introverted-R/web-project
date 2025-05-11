<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
             $post = Post::with('comments')->orderBy('created_at', 'desc')->paginate(5);
            $usertype = Auth()->user()->usertype;
    
            if ($usertype == 'user') {
                return view('home.homepage',compact('post'));
            } elseif ($usertype == 'admin') {
                return view('admin.showposts', ['post_data' => $post]);
            }
        }
        
        return redirect()->back();
    }
    public function homepage()
    {
         $post = Post::orderBy('created_at', 'desc')->paginate(5);;
        return view('home.homepage', compact('post'));
      
    }
}
