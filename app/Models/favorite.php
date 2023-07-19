<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;
    protected $fillable=['product_id ','user_id '];
    public function products(){
        return $this->hasMany(product::class);
    }
    public function user(){
        return $this->belongsToMany(User::class,'favorites');
    }
}
