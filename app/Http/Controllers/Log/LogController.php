<?php

namespace App\Http\Controllers\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index()
    {
    	return view('log.index')->with([
    		'logs' => Activity::all()
    	]);
    }
}
