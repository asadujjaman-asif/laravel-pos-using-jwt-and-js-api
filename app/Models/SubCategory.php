<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //use HasFactory;
    protected $fillables=['name', 'description','slug','user_id','category_id'];
}
