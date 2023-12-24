<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorWiseSize extends Model
{
    use HasFactory;
    public function color(){
        return $this->hasOne(Color::class,'id','color_id');
    }
}
