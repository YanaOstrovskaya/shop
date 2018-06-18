<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
            public function portfolio(){
    	//по умолчанию определяет внешний ключ по названию метод_id
    	return $this->belongsTo('App\Portfolio');
    }
}
