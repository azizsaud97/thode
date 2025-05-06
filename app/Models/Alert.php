<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $table = 'alert';

    protected $fillable = [
        'user_id', 'camel_id', 'type', 'message', 'timestamp'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function camel()
    {
        return $this->belongsTo(Camel::class, 'camel_id');
    }
}
