<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Schemas\Components\Text;


class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->belowContent(Text::make('This is the students\'s full name.')->weight(FontWeight::Bold))
                    ->aboveContent(Text::make('This is the students\'s full name.')->weight(FontWeight::Bold))
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel(),
                DatePicker::make('date_of_birth'),
                TextInput::make('address_line_1')
                    ->required(),
                TextInput::make('address_line_2'),
                FusedGroup::make([
                    TextInput::make('city')
                        ->placeholder('City'),
                    Select::make('state')
                        ->placeholder('State')
                        ->options([
                            'AL' => 'Alabama',
                            'AK' => 'Alaska',
                            'AZ' => 'Arizona',
                            'AR' => 'Arkansas',
                            'CA' => 'California',
                            // Add more states as needed
                        ])->default('CA'),
                ]),
                TextInput::make('zip_code'),
                TextInput::make('country'),
            ]);
    }
}
