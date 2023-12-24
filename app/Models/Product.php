<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function slider(){
        return $this->hashOne(Slider::class);
    }
    public function sub_categories(){
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
}
