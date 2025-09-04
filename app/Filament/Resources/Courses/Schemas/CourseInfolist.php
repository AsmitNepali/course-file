<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('course_category_id')
                    ->numeric(),
                TextEntry::make('instructor.name')
                    ->numeric(),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('status'),
                TextEntry::make('thumbnail'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
