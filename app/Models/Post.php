<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id','title','description','local','latitude',
    						'longitude','status','image_name'];

    protected $table    = 'posts';


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
