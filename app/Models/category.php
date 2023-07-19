<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['id','image','categoryName_ar','categoryName_en'];
    public function stores(){
        return $this->hasMany(store::class);
    }

    // public function products(){
    //     return $this->hasMany(product::class);
    // }
}
