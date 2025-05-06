<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GpsLocation extends Model
{
    use HasFactory;

    protected $table = 'gps_location';

    protected $fillable = [
        'camel_id',
        'timestamp',
        'latitude',
        'longitude'
    ];

    public $timestamps = false;

    public function camel()
    {
        return $this->belongsTo(Camel::class, 'camel_id');
    }
}
