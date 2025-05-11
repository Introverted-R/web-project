<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class);
}

public function post()
{
    return $this->belongsTo(Post::class);
}
public static function isLiked($user_id, $post_id)
{
    $liked = Like::where("user_id","=", $user_id)->where("post_id","=", $post_id)->first();
    if($liked)
    {return true;
    }else{
        return false;
    }
}
}
