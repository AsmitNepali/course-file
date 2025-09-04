<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class EnrollmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Enrollment Details')
                    ->columns(1)
                    ->schema([
                        TextEntry::make('student.name')
                            ->numeric(),
                        TextEntry::make('course.title')
                            ->numeric(),
                        TextEntry::make('status'),
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ])
                    ->columns()
                    ->columnSpanFull(),
                Section::make('Vertical Tabs')
                    ->schema([
                        Tabs::make('vertical_tabs')
                            ->label('Vertical Tabs')
                            ->tabs([
                                Tab::make('Tab 1')
                                    ->schema([
                                        TextEntry::make('example_field_1')
                                            ->label('Example Field 1')
                                            ->default('Minim laboris non aliqua culpa anim. Adipisicing consequat culpa culpa ipsum labore aute sunt fugiat elit do. Irure do occaecat dolore mollit dolore. Duis qui sint laboris. Aute duis aute deserunt in ut officia fugiat ullamco nisi quis officia velit. Ipsum dolor aute aute labore id do dolor nisi cillum sint anim irure.'),
                                    ]),
                                Tab::make('Tab 2')
                                    ->schema([
                                        TextEntry::make('example_field_2')
                                            ->label('Example Field 2')
                                            ->default('Excepteur excepteur excepteur enim. Dolor excepteur excepteur enim. Excepteur excepteur excepteur enim. Dolor excepteur excepteur enim. Excepteur excepteur excepteur enim. Dolor excepteur excepteur enim.'),
                                    ]),
                                Tab::make('Tab 3')
                                    ->schema([
                                        TextEntry::make('example_field_3')
                                            ->label('Example Field 3')
                                            ->default('Excepteur excepteur excepteur enim. Dolor excepteur excepteur enim. Excepteur excepteur excepteur enim. Dolor excepteur excepteur enim. Excepteur excepteur excepteur enim. Dolor excepteur excepteur enim.'),
                                    ]),
                            ])
                            ->vertical()
                            ->columnSpanFull()
                    ])->columnSpanFull(),
            ]);
    }
}
