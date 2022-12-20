<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lvovich extends Model
{
    use HasFactory;
    protected $fillable = ['data','comment','action', 'id_user'];
}
