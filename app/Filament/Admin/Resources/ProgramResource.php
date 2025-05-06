<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProgramResource\Pages;
use App\Filament\Admin\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\ProgramResource\RelationManagers\DaysRelationManager;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Toggle::make('is_premium')->label('Премиум'),

            TextInput::make('price')->numeric()->label('Цена'),
            TextInput::make('stock')->numeric()->label('Остаток мест'),
            TextInput::make('days')->numeric()->label('Количество дней'),

            DateTimePicker::make('start_time')->label('Начало'),
            DateTimePicker::make('end_time')->label('Конец'),

            TextInput::make('duration_hours')->numeric()->label('Продолжительность (часы)'),

            FileUpload::make('image')->image()->disk('public')->directory('programs'),

            Select::make('program_category_id')
                ->options(function () {
                    return \App\Models\ProgramCategory::orderBy('id')
                        ->get()
                        ->mapWithKeys(function ($item) {
                            return [$item->id => $item->title_ru ?? ''];
                        })
                        ->toArray();
                })
                ->label('Категория')
                ->searchable()
                ->required(),




            Tabs::make('Переводы')->tabs([
                Tab::make('Русский')->schema([
                    TextInput::make('title_ru')->label('Название (RU)')->required(),
                    Textarea::make('description_ru')->label('Описание (RU)'),
                ]),
                Tab::make('English')->schema([
                    TextInput::make('title_en')->label('Title (EN)'),
                    Textarea::make('description_en')->label('Description (EN)'),
                ]),
            ]),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('slug')->label('Slug')->sortable()->searchable(),
            TextColumn::make('title_ru')->label('Название (RU)'),
            TextColumn::make('category')
                ->label('Категория')
                ->getStateUsing(fn ($record) => $record->category ? $record->category->title_ru : '-')
                ->sortable(false)
                ->searchable(false),
            ToggleColumn::make('is_premium')->label('Премиум'),
            TextColumn::make('price')->label('Цена'),
            TextColumn::make('stock')->label('Остаток'),
            TextColumn::make('days')->label('Дней'),
            ImageColumn::make('image')
                ->label('Изображение')
                ->disk('public')
                ->getStateUsing(fn ($record) => asset('storage/' . $record->image))
                ->circular(),

            TextColumn::make('start_time')->dateTime()->label('Начало'),
            TextColumn::make('end_time')->dateTime()->label('Конец'),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }




    public static function getRelations(): array
    {
        return [
            DaysRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
