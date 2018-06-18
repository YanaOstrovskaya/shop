<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Translit;
class Page extends Model
{
        	public function setAliasAttribute($value)
	{//форматировать для url строки
		$this->attributes['alias'] = $value==''?Translit::makeUrlCode($this->attributes['name']):Translit::makeUrlCode($value);
	}
}
