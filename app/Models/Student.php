<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'zip_code',
        'country'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'email' => 'string',
        'phone' => 'string',
        'address_line_1' => 'string',
        'address_line_2' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip_code' => 'string',
        'country' => 'string'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
