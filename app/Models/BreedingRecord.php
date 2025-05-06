<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedingRecord extends Model
{
    use HasFactory;

    protected $table = 'breeding_record';

    protected $fillable = [
        'camel_id', 'mate_id', 'date', 'status'
    ];

    public function camel()
    {
        return $this->belongsTo(Camel::class, 'camel_id');
    }

    public function mate()
    {
        return $this->belongsTo(Camel::class, 'mate_id');
    }

    public $timestamps = false;

}
