<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TrackerDevice extends Model
{
    use HasFactory;

    protected $table = 'tracker_device';

    protected $fillable = [
        'camel_id', 'device_type', 'status', 'device_model', 'firmware_version'
    ];

    public function camel()
    {
        return $this->belongsTo(Camel::class, 'camel_id');
    }

    public function latestGps(): HasOne
    {
        return $this->hasOne(GpsLocation::class, 'camel_id', 'camel_id')->latest('timestamp');
    }

    public $timestamps = false;

}
