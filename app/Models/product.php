<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class product extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name_ar','name_en','price','store_id','product_image','discount', 'description_ar', 'description_en'];
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function review(){
        return $this->hasMany(Review::class);
    }
    public function favorites(){
        return $this->belongsToMany(favorite::class,'favorites');
    }
    public function stores(){
        return $this->belongsTo(store::class);
    }
}
