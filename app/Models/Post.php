<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name','description','slug','meta_title','meta_description','meta_keywords','status',];
}
