<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['category_id','name', 'content', 'rating'];

    public function categories()
    {
        return $this->BelongsTo('App\Models\Category');
    }
}
