<?php

namespace App\Http\Controllers\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function index()
    {
    	return view('log.index')->with([
    		'logs' => Activity::orderBy('created_at', 'desc')->get()
    	]);
    }

    public function clear()
    {
        $logs = Activity::get();

        $logs->each(function($log) {
            $log->delete();
        });

        return redirect()->back();
    }
}
