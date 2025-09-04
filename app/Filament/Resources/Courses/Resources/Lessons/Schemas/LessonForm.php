<?php

namespace App\Filament\Resources\Courses\Resources\Lessons\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LessonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->label('Lesson Title')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Lesson Description')
                    ->columnSpanFull()
                    ->maxLength(1000)
                    ->required(),
            ]);
    }
}
