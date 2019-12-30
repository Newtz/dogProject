<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['id','post_id','image_path'];

    protected $table    = 'images';


    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
