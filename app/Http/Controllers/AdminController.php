<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alluminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class AdminController extends Controller
{
   
    public function showPosts(){
        $post_data = Post::all();
        return view('admin.showposts',compact('post_data'));
       }

    public function deletePost($id){

        $post = Post::find($id);
        $post->delete();

        return redirect('admin.showposts')->with('message','Post deleted Successfully') ;

      }

      public function showUsers(){
        $users = User::all();
        return view('admin.showUsers',compact('users'));
      }
      public function activate($id){
        $user = User::find($id);
        $user->status = 'active';
        $user->save();

        return redirect('admin/showUsers')->with('message','activated user successfully');

      }
      public function deactivate($id){
        $user = User::find($id);
        $user->status = 'deactive';
        $user->save();

        return redirect('admin/showUsers')->with('message','deactivated user successfully');
      }
      public function showComments(){
    
        $comments = Comment::all();
        $inappropriateWords = ['abuse', 'drug', 'sex'];
        $filteredComments = $comments->filter(function ($comment) use ($inappropriateWords) {
            return Comment::containsInappropriateWord($comment->content, $inappropriateWords);
        });
        return view('admin.showcomments', ['comments' => $filteredComments]);
    }
    public function deleteComment($id)
    {
      $comment = Comment::find($id);
      $comment->delete();
      return redirect('admin/showComments')->with('message','comment deleted successfully');
    }
}

