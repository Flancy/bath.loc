<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class Shedule extends Model
{
    use LogsActivity;
    
    protected $fillable = [
    	'children_id', 'trainer_id', 'start_date', 'end_date', 'pay'
    ];

    public function children()
    {
    	return $this->hasOne('App\Models\Children', 'id', 'children_id');
    }

    public function trainer()
    {
    	return $this->hasOne('App\Models\Trainer', 'id', 'trainer_id');
    }
}
