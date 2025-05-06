<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Program;
use App\Models\Day;
use App\Models\ProgramCategory;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Программы', Program::count())
                ->description('Всего программ')
                ->icon('heroicon-o-rectangle-stack')
                ->color('primary'),

            Card::make('Дни', Day::count())
                ->description('Всего дней')
                ->icon('heroicon-o-calendar-days')
                ->color('info'),

            Card::make('Категории', ProgramCategory::count())
                ->description('Количество категорий')
                ->icon('heroicon-o-tag')
                ->color('warning'),

            Card::make('Пользователи', User::count())
                ->description('Зарегистрированные пользователи')
                ->icon('heroicon-o-users')
                ->color('success'),
        ];
    }
}
