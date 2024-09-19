<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =
    [
        'id_user',
        'postingan',
        'gambar',
        'tag',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    protected $date = ['deleted_at'];

    public function getTimeAgoAttribute()
    {
        return Carbon::parse($this->updated_at)->diffForHumans();
    }
}
