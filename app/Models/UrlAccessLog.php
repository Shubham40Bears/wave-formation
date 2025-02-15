<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlAccessLog extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'ip_address', 'vcf_profile_data_id', 'access_count'];

    public function vcfProfileData()
    {
        return $this->belongsTo(VcfProfileData::class);
    }
}
