<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','model_no','brand'];

    public function Brand(){
        return $this->belongsTo(Brand::class,'brand');
    }
}
