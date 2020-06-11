<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class Cash extends Model
{
    use LogsActivity;
    
	const TYPE_PRICE_NON_CASH = 'Безналичные';
	const TYPE_PRICE_CASH = 'Наличные';
	const STATUS_COMING = 'Приход';
	const STATUS_EXPEND = 'Расход';

    protected $fillable = [
    	'price', 'type_price', 'status'
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
    	switch ($eventName) {
    		case 'created':
    			return "Добавлена платежка";
    			break;
    		case 'updated':
    			return "Платежка обновлена";
    			break;
    		case 'deleted':
    			return "Платежка удалена";
    			break;
    		default:
    			return "This model has been {$eventName}";
    			break;
    	}
    }
}
