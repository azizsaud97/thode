<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'national_id', 'name', 'email', 'phone', 'password',
        'address', 'registration_date', 'role', 'token', 'civil_registry'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'registration_date' => 'datetime',
    ];

    public function camels(): HasMany
    {
        return $this->hasMany(Camel::class, 'owner_id');
    }

    public $timestamps = false;
}
