<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'post';

    protected $fillable = ['category_id','name', 'content'];

    public function categories(){
        return $this->BelongsTo('App\Categories');
    } 
}
