<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Camel extends Model
{
    use HasFactory;

    protected $table = 'camel';

    protected $fillable = [
        'tag_number', 'name', 'breed', 'color',
        'weight', 'height', 'date_of_birth', 'gender',
        'origin', 'health_status', 'location', 'owner_id', 'rfid_chip_id', 'health_issue'
    ];

    public $timestamps = false;

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function trackerDevice(): HasOne
    {
        return $this->hasOne(TrackerDevice::class, 'camel_id');
    }

    public function gpsLocation()
    {
        return $this->hasOne(GpsLocation::class, 'camel_id');
    }

    public function healthRecords()
    {
        return $this->hasMany(HealthRecord::class, 'camel_id');
    }

    public function breedingRecords()
    {
        return $this->hasMany(BreedingRecord::class, 'camel_id');
    }

    public function latestHealth()
    {
        return $this->hasOne(HealthRecord::class, 'camel_id')->latest('checkup_date');
    }

}
