<?php

namespace App\Jobs;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
                $this->sendWhatsappNotification($student, 'attendance_update_out', $this->time, $this->date);
            }
        } else {
            // 4. No record today? Create a new check_in
            Attendance::create([
                'student_id'      => $student->id,
                'attendance_date' => $this->date,
                'check_in'        => $this->time,
                'status'          => 'present',
            ]);
            $this->sendWhatsappNotification($student, 'attendance_update', $this->time, $this->date);
        }
    }
    public function sendWhatsappNotification($student, $type, $time, $date){
        Log::error("WhatsApp API Init: " .config('services.whatsapp.phone_id'));
        $response = Http::withToken(config('services.whatsapp.token'))
            ->post("https://graph.facebook.com/v21.0/" . config('services.whatsapp.phone_id') . "/messages", [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => $student->phone_number,
                'type' => 'template',
                'template' => [
                    'name' => $type,
                    'language' => ['code' => 'en'],
                    'components' => [
                        [
                            'type' => 'header', // Added because your template has a header variable
                            'parameters' => [
                                [
                                    'type' => 'text',
                                    'parameter_name' => 'student_name_first',
                                    'text' => explode(' ', $student->name)[0] // Gets just the first name
                                ]
                            ]
                        ],
                        [
                            'type' => 'body',
                            'parameters' => [
                                [
                                    'type' => 'text',
                                    'parameter_name' => 'student_name',
                                    'text' => $student->name
                                ],
                                [
                                    'type' => 'text',
                                    'parameter_name' => 'date',
                                    'text' => $date
                                ],
                                [
                                    'type' => 'text',
                                    'parameter_name' => 'time',
                                    'text' => $time
                                ],
                            ]
                        ]
                    ]
                ]
            ]);

        if ($response->successful()) {
            Log::error("WhatsApp API Success: " . $response->body());
            return "Message sent! ID: " . $response->json()['messages'][0]['id'];
        }

        Log::error("WhatsApp API Error: " . $response->body());
        return "Failed: " . $response->json()['error']['message'];
    }
}
