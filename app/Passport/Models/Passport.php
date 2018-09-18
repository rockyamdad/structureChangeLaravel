<?php

namespace App\Passport\Models;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    protected $fillable = ['email','name','number', 'filename','date','office'];
}
