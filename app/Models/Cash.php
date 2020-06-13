<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
	const TYPE_PRICE_NON_CASH = 'Безналичные';
	const TYPE_PRICE_CASH = 'Наличные';
	const STATUS_COMING = 'Приход';
	const STATUS_EXPEND = 'Расход';

    protected $fillable = [
    	'price', 'type_price', 'status'
    ];
}
