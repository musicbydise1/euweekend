<?php

namespace App\Filament\Admin\Resources\ProgramCategoryResource\Pages;

use App\Filament\Admin\Resources\ProgramCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgramCategories extends ListRecords
{
    protected static string $resource = ProgramCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
