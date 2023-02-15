<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pazov extends Model
{
    use HasFactory;
    protected $fillable = ['date','product','price', 'id_user', "quantity"];
}
