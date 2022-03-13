<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'gender',
        'address',
        'email',
        'phone',
        'avatar',
        'birthdate',
        'country',
        'nationality',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function getFullNameAttribute(): string
    {
        return $this->title . ' ' . $this->first_name . ' ' . $this->last_name;
    }
}
