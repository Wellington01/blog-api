<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'post';

    protected $fillable = ['category_id','name', 'content', 'rating'];

    public function categories(){
        return $this->BelongsTo('App\Categories');
    } 
}
