<?php

namespace App\Filament\Admin\Resources\DayResource\Pages;

use App\Filament\Admin\Resources\DayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDays extends ListRecords
{
    protected static string $resource = DayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
