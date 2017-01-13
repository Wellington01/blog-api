<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable = ['name'];

    public function posts(){
        return $this->hasOne('App\Post', 'category_id');
    }
}
