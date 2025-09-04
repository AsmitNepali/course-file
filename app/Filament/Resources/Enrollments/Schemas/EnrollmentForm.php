<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use App\Enums\EnrollmentStatus;
use App\Filament\Resources\Courses\Tables\CoursesTable;
use Filament\Forms\Components\ModalTableSelect;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;

class EnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->schema([
                        Section::make('Enrollment Details')
                            ->columns(1)
                            ->schema([
                                Select::make('student_id')
                                    ->relationship('student', 'name')
                                    ->required(),
                                ModalTableSelect::make('course_id')
                                    ->relationship('course', 'title')
                                    ->multiple()
                                    ->tableConfiguration(CoursesTable::class),

                                Select::make('course_id')
                                    ->relationship('course', 'title')
                                    ->required(),
                                Select::make('status')
                                    ->options(EnrollmentStatus::class)
                                    ->default('active')
                                    ->required(),
                            ]),
                        Section::make('Auditing')
                            ->schema([
                                TextEntry::make('created_at')
                                    ->dateTime(),
                                TextEntry::make('updated_at')
                                    ->dateTime(),
                            ])->visibleOn(Operation::Edit),
                    ]),

//                ->columnSpanFull() // By default, not full width
            ]);
    }
}
