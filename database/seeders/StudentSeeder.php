<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create or Find a School
        $school = School::updateOrCreate(
            ['subdomain' => 'greenwood'],
            [
                'uuid' => Str::uuid(),
                'name' => 'Greenwood International School',
                'admin_emails' => ['admin@greenwood.edu', 'office@greenwood.edu'],
                'logo_url' => 'https://placehold.co/400x400?text=Greenwood+Logo',
            ]
        );

        // 2. Create the Student
        $student = Student::updateOrCreate(
            ['roll_number' => 'GH-2026-001', 'school_id' => $school->id],
            [
                'uuid' => Str::uuid(),
                'name' => 'Shubham Bhattacharya',
                'blood_group' => 'O+',
                'father_name' => 'Mr. Bhattacharya',
                'mother_name' => 'Mrs. Bhattacharya',
                'phone_number' => '+919876543210',
                'emergency_contact' => '+919000000000',
                'address' => '123 Developer Lane, Bhilai',
                'photo_path' => 'students/photos/sample_student.jpg',
            ]
        );

        // 3. Create 4 Days of Attendance
        $history = [
            ['date' => Carbon::today(), 'status' => 'present', 'remark' => 'On time'],
            ['date' => Carbon::yesterday(), 'status' => 'present', 'remark' => 'On time'],
            ['date' => Carbon::now()->subDays(2), 'status' => 'late', 'remark' => 'Heavy traffic'],
            ['date' => Carbon::now()->subDays(3), 'status' => 'present', 'remark' => 'On time'],
        ];

        foreach ($history as $data) {
            Attendance::updateOrCreate(
                ['student_id' => $student->id, 'attendance_date' => $data['date']],
                [
                    'status' => $data['status'],
                    'check_in' => $data['status'] === 'late' ? '09:15:00' : '08:00:00',
                    'check_out' => '15:30:00',
                    'remarks' => $data['remark'],
                ]
            );
        }
    }
}