<?php

namespace App\Filter;

class LvovichFilter extends QueryFilter{
    public function id_user($id_user){
        return $this->builder->where('id_user', $id_user);
    }
}
