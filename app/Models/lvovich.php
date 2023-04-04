<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lvovich extends Model
{
    use HasFactory;
    protected $fillable = ['date','comment','action', 'id_user'];
  //  protected $dates = [];
    public function scopeFilter(Bulder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}


