<?php

namespace App\Filament\Resources\Instructors\Schemas;

use App\Filament\Resources\Instructors\CustomBlocks\HeroBlock;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\Operation;

class InstructorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Instructor Details')
                    ->schema([
                        TextInput::make('name')
                            ->belowContent(Text::make('Below: This is the students\'s full name.')->weight(FontWeight::Bold))
                            ->aboveContent(Text::make('Above: This is the students\'s full name.')->weight(FontWeight::Bold))
                            ->required(),
                        TextInput::make('email')
                            ->email()
                            ->required(),

                        TextInput::make('phone')
                            ->tel()
                            ->tel(),
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
                        Slider::make('salary')
                            ->range(minValue: 100, maxValue: 1000)
                            ->tooltips()
                            ->step(10)
                    ])
                    ->columns()
                    ->columnSpanFull(),
                Section::make('Biography')
                    ->schema([
                        RichEditor::make('bio')
                            ->mergeTags([
                                'name',
                                'email',
                                'phone',
                                'profile_photo_path',
                                'created_at',
                                'updated_at',
                            ])
                            ->customBlocks([
                                HeroBlock::class
                            ])
                            ->activePanel('customBlocks')
                            ->columnSpanFull(),
                        FileUpload::make('profile_photo_path')->columnSpanFull()
                    ])
                    ->columns()
                    ->columnSpanFull(),
                CodeEditor::make('description')
                    ->language(CodeEditor\Enums\Language::Json),
                 Section::make('Auditing')
                     ->schema([
                         TextEntry::make('created_at')
                             ->dateTime(),
                         TextEntry::make('updated_at')
                             ->dateTime(),
                     ])->visibleOn(Operation::Edit),
            ]);
    }
}
