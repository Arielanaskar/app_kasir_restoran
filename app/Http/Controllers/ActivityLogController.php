<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index ()
    {
        $data = ActivityLog::with(['user', 'user.level'])->whereDate('created_at', Carbon::now())->latest()->get();
        return view('activityLog', [
            'data' => $data
        ]);
    }
}
