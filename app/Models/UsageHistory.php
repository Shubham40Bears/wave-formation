<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsageHistory extends Model
{
    use HasFactory;
    public function card()
    {
        return $this->belongsTo(UserCards::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
