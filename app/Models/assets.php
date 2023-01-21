<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assets extends Model
{
    use HasFactory;
    protected $fillable = ['date','product','price', 'id_user'];
}
