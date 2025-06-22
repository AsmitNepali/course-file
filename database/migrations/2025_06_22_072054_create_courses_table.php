<?php

use App\Models\CourseCategory;
use App\Models\Instructor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignIdFor(CourseCategory::class);
            $table->text('description')->nullable();
            $table->foreignIdFor(Instructor::class);
            $table->decimal('price')->default(0.00);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->string('thumbnail')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
