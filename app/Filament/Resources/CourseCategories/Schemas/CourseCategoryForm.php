<?php

namespace App\Filament\Resources\CourseCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class CourseCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Course Category')
                    ->description('Create a new course category.')
                    ->icon(Heroicon::OutlinedRectangleStack)
                    ->schema([
                        TextInput::make('name')
                            ->afterStateUpdatedJs(<<<'JS'
                            // convert the name to a slug
                            $set('slug', $state.toLowerCase()
                                .replace(/[^a-z0-9 -]/g, '')
                                .replace(/\s+/g, '-')
                                .replace(/-+/g, '-')
                                .trim('-'));
                            JS)
                            ->required(),
                        TextInput::make('slug')
                            ->required(),
                    ])
                    ->columns()
                ->columnSpanFull(),

            ]);
    }
}
