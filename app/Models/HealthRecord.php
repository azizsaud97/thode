<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    protected $table = 'health_record';

    protected $fillable = [
        'camel_id', 'checkup_date', 'weight', 'height', 'temperature',
        'heart_rate', 'blood_test_results', 'allergies', 'medications_given',
        'next_checkup_date', 'diagnosis', 'treatment', 'veterinarian'
    ];

    public function camel()
    {
        return $this->belongsTo(Camel::class, 'camel_id');
    }
    public $timestamps = false;

}
