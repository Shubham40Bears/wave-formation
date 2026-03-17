<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceMarker extends Controller
{
    public function markAttendance(Request $request, $uuid)
    {
        $studentUuid = $uuid;
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->toTimeString();

        // 2. Dispatch to the Job (No API call inside)
        ProcessAttendance::dispatch($studentUuid, $currentDate, $currentTime);

        return response()->json([
            'status' => 'success',
            'message' => 'Attendance queued for processing.'
        ]);
    }
}
