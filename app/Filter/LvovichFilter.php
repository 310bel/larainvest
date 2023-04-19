<?php

namespace App\Filter;

class LvovichFilter extends QueryFilter{
    public function category_id($category_id){
//        if(!empty($category_id)){
        return $this->builder->where('category_id', $category_id);}
//    }
}
