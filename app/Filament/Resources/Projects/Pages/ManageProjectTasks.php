<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Resources\Pages\ManageRelatedRecords;

class ManageProjectTasks extends ManageRelatedRecords
{

    protected static string $resource = ProjectResource::class;

    protected static string $relationship = 'tasks';

    protected static ?string $relatedResource = ProjectResource::class;
}
