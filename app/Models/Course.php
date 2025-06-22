<?php

namespace App\Models;

use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'description',
        'instructor_id',
        'price',
        'status',
        'thumbnail'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => CourseStatus::class
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
