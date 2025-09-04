<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'bio',
        'phone',
        'profile_photo_path',
        'description',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'zip_code',
        'country',
        'salary'
    ];

    protected $casts = [
        'profile_photo_path' => 'string',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
