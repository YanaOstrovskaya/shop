<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filter;
use Translit;
class Portfolio extends Model
{
      public function filter(){
    	//по умолчанию определяет внешний ключ по названию метод_id
    	return $this->belongsTo('App\Filter');
    }
        	public function setSlugAttribute($value)
	{//форматировать для url строки
		$this->attributes['slug'] = $value==''?Translit::makeUrlCode($this->attributes['name']):Translit::makeUrlCode($value);
	}

}
