<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Image extends Model
{
    protected $fillable = ['id','post_id','image_path'];
    public $timestamps = false;
    protected $table    = 'images';


    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
