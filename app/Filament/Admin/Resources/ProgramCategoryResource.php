<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProgramCategoryResource\Pages;
use App\Models\ProgramCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput, Tabs, Textarea};
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn};
use Filament\Resources\Resource;
use App\Filament\Admin\Resources\ProgramCategoryResource\RelationManagers\ProgramsRelationManager;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class ProgramCategoryResource extends Resource
{
    protected static ?string $model = ProgramCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function form(Form $form): Form
    {
        return $form->schema([


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
        return $table
            ->columns([
                TextColumn::make('slug')->label('Slug')->sortable()->searchable(),
                TextColumn::make('title_ru')->label('Название (RU)')->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(), // кнопка удаления для отдельной записи
            ])
            ->bulkActions([
                DeleteBulkAction::make(), // массовое удаление
            ]);

    }

    public static function getRelations(): array
    {
        return [
            ProgramsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgramCategories::route('/'),
            'create' => Pages\CreateProgramCategory::route('/create'),
            'edit' => Pages\EditProgramCategory::route('/{record}/edit'),
        ];
    }
}
