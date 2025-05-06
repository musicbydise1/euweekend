<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DayResource\Pages;
use App\Models\Day;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class DayResource extends Resource
{
    protected static ?string $model = Day::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('day_number')
                ->label('Номер дня')
                ->numeric()
                ->required(),

            FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('days'),

            Select::make('program_id')
                ->options(function () {
                    return \App\Models\Program::orderBy('id')
                        ->get()
                        ->mapWithKeys(function ($item) {
                            return [$item->id => $item->title_ru ?? ''];
                        })
                        ->toArray();
                })
                ->label('Программа')
                ->searchable()
                ->required(),


            Tabs::make('Переводы')->tabs([
                Tab::make('Русский')->schema([
                    TextInput::make('title_ru')
                        ->label('Название (RU)')
                        ->required(),
                    Textarea::make('description_ru')
                        ->label('Описание (RU)'),
                ]),
                Tab::make('English')->schema([
                    TextInput::make('title_en')
                        ->label('Title (EN)'),
                    Textarea::make('description_en')
                        ->label('Description (EN)'),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('day_number')
                ->label('День')
                ->sortable(),
            TextColumn::make('title_ru')
                ->label('Название (RU)'),
            ImageColumn::make('image')
                ->label('Изображение')
                ->disk('public')
                ->getStateUsing(fn ($record) => asset('storage/' . $record->image))
                ->circular(),

            TextColumn::make('program')
                ->label('Программа')
                ->getStateUsing(fn ($record) =>
                $record->program ? $record->program->title_ru : '-'
                )
                ->sortable(false)
                ->searchable(false),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(), // Индивидуальное удаление
            ])
            ->bulkActions([
                DeleteBulkAction::make(), // Массовое удаление
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListDays::route('/'),
            'create' => Pages\CreateDay::route('/create'),
            'edit'   => Pages\EditDay::route('/{record}/edit'),
        ];
    }
}
