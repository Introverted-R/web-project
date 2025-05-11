<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public static function containsInappropriateWord($content, $inappropriateWords) {
        foreach ($inappropriateWords as $word) {
            if (stripos($content, $word) !== false) {
                return true;
            }
        }
        return false;
    }
}
