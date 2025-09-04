<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StudentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('phone'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('address_line_1'),
                TextEntry::make('address_line_2'),
                TextEntry::make('city'),
                TextEntry::make('state'),
                TextEntry::make('zip_code'),
                TextEntry::make('country'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
