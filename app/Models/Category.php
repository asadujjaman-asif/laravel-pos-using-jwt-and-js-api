<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use HasFactory;
    protected $fillable=['category_name','slug','user_id'];
    public function subCategory(){
        return $this->hasOne(SubCategory::class);
    }
    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }
}
