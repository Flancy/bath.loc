<?php

namespace App\Http\Controllers\CalendarEvent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shedule;

class CalendarEventController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }

    public function getShedule()
    {
        $shedules = Shedule::with(['trainer', 'children'])->get();

        return $shedules;
    }
}
