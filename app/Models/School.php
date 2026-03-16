<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'subdomain',
        'admin_emails',
        'logo_url',
    ];

    protected $casts = [
        'admin_emails' => 'array', // Automatically converts JSON to a PHP array
    ];

    /**
     * Get all students for the school.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}