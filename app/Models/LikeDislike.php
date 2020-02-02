<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    protected $guarded    = [];
    public    $timestamps = false;
    protected $table      = 'likeDislike';
}
