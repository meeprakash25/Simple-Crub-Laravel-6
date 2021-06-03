<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','website'];

    public function products(){
        return $this->hasMany(Product::class,'brand');
    }
}
