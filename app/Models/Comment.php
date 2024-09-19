<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id_posts',
        'id_user',
        'komentar',
        'image',
        'hashtag',
    ];
    protected $date = ['deleted_at'];
    public function post()
    {
        return $this->belongsTo(Post::class, 'id_posts');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
