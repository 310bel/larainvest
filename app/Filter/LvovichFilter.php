<?php

namespace App\Filter;

class LvovichFilter extends \App\Filter\QueryFilter{
    public function category_id($id){
        return $this->builder->where('id_user', $id);
    }
}
