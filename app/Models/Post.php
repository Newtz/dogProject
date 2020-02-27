<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Comment;
use App\User;

class Post extends Model
{
    protected $fillable = ['id','title','description','local','latitude',
                            'longitude','status','image_name'];

    protected $table    = 'posts';


    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'post_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
