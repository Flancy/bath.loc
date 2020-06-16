<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    protected $fillable = [
    	'children_id', 'trainer_id', 'days', 'pay'
    ];

    public function children()
    {
    	return $this->hasOne('App\Models\Children', 'id', 'children_id');
    }

    public function trainer()
    {
    	return $this->hasOne('App\Models\Trainer', 'id', 'trainer_id');
    }

    protected $casts = [
        'days' => 'array'
    ];
}
