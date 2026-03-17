<?php

namespace App\Jobs;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAttendance implements ShouldQueue
{
    // use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $studentUuid;
    protected $date;
    protected $time;

    /**
     * Create a new job instance.
     */
    public function __construct($studentUuid, $date, $time)
    {
        $this->studentUuid = $studentUuid;
        $this->date = $date;
        $this->time = $time;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // 1. Resolve Student ID by UUID
        $student = Student::where('uuid', $this->studentUuid)->first();

        if (!$student) {
            // Optional: Log error if student not found
            return;
        }

        // 2. Check for an existing record for this student on this date
        $attendance = Attendance::where('student_id', $student->id)
            ->whereDate('attendance_date', $this->date)
            ->first();

        if ($attendance) {
            // 3. If check_in exists but check_out is empty, mark check_out
            if (empty($attendance->check_out)) {
                $attendance->update([
                    'check_out' => $this->time,
                    'remarks'    => 'complete' // Optional status update
                ]);
            }
        } else {
            // 4. No record today? Create a new check_in
            Attendance::create([
                'student_id'      => $student->id,
                'attendance_date' => $this->date,
                'check_in'        => $this->time,
                'status'          => 'present',
            ]);
        }
    }
}
