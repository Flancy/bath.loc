<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class Trainer extends Model
{
    use LogsActivity;
    
    protected $fillable = [
    	'full_name', 'phone_number'
    ];
}
