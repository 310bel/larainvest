<?php

namespace App\Models;

use App\Filter\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class lvovich extends Model
{
    use HasFactory;
    protected $fillable = ['date','comment','action','id_user', 'category_id'];
  //  protected $dates = [];
    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}


