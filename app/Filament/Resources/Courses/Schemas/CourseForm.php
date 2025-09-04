<?php

namespace App\Filament\Resources\Courses\Schemas;

use App\Enums\CourseStatus;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Pages\Page;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('course_category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('instructor_id')
                    ->relationship('instructor', 'name')
                    ->live()
                    ->registerActions([
                        Action::make('addNewInstructorUpdated')
                            ->schema([
                                TextInput::make('name')
                            ])
                        ->requiresConfirmation()
                    ])
                    ->afterStateUpdated(function(Page $livewire, Component $component) {
                        $livewire->mountAction('addNewInstructorUpdated', context: [
                            'schemaComponent' => $component->getKey(),
                        ]);
                    })
                    ->required(),
                Slider::make('price')
                ->range(minValue: 10, maxValue: 100)
                    ->step(10)
                ->tooltips(),
                Select::make('status')
                    ->options(CourseStatus::class)
                    ->default('draft')
                    ->required(),
                TextInput::make('thumbnail'),
                Section::make('Members')
                ->schema([
                    Repeater::make('members')
                        ->table([
                            TableColumn::make('Name'),
                            TableColumn::make('Role'),
                        ])
                        ->schema([
                            TextInput::make('name')
                                ->required(),
                            Select::make('role')
                                ->options([
                                    'member' => 'Member',
                                    'administrator' => 'Administrator',
                                    'owner' => 'Owner',
                                ])
                                ->required(),
                        ])
                        ->columns()
                ])->columnSpanFull()
            ]);
    }
}
