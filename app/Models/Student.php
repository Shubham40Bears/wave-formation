<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = [
        'uuid',
        'school_id',
        'name',
        'roll_number',
        'blood_group',
        'father_name',
        'mother_name',
        'phone_number',
        'emergency_contact',
        'address',
        'photo_path',
        'dob',
        'class'
    ];
    protected $casts = [
        'dob' => 'date',
    ];

    /**
     * Get the school that owns the student.
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Get the attendance records for the student.
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}