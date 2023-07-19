<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class store extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['product_image','details_ar','details_en','name_ar','name_en','category_id','store_image'];
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function product()
    {
        return $this->hasMany(product::class);
    }
}
