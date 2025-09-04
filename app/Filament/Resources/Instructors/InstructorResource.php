<?php

namespace App\Filament\Resources\Instructors;

use App\Filament\Resources\Instructors\Pages\CreateInstructor;
use App\Filament\Resources\Instructors\Pages\EditInstructor;
use App\Filament\Resources\Instructors\Pages\ListInstructors;
use App\Filament\Resources\Instructors\Pages\ViewInstructor;
use App\Filament\Resources\Instructors\Schemas\InstructorForm;
use App\Filament\Resources\Instructors\Schemas\InstructorInfolist;
use App\Filament\Resources\Instructors\Tables\InstructorsTable;
use App\Models\Instructor;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Image;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InstructorResource extends Resource
{
    protected static ?string $model = Instructor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return InstructorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InstructorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstructorsTable::configure($table)
            ->toolbarActions([
                Action::make('Header Action')
                    ->schema([
                        Text::make('This is a header action')
                            ->color('primary')
                            ->icon(Heroicon::AcademicCap)
                            ->size('sm')
                            ->iconPosition('left'),
                        Image::make('https://picsum.photos/200/300', 'https://picsum.photos/200/300')
                            ->alt('Example Image'),
                    ])
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInstructors::route('/'),
            'create' => CreateInstructor::route('/create'),
            'view' => ViewInstructor::route('/{record}'),
            'edit' => EditInstructor::route('/{record}/edit'),
        ];
    }
}
