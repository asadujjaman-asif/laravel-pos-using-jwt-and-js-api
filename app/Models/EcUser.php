<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcUser extends Model
{
    protected $fillable = ['email','otp'];
    use HasFactory;
}
