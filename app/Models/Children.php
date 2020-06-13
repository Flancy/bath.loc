<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $fillable = [
        'recording_date', 'full_name', 'birth_date', 'age', 'certificate_date', 'full_name_parents', 'phone_number_parents', 'address', 'payment_summ', 'payment_status', 'trainer_id'
    ];

    public function trainer()
    {
    	return $this->hasOne('App\Models\Trainer', 'id', 'trainer_id');
    }
}
