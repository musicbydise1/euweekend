<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->label('Имя')->required(),
            TextInput::make('email')->label('Почта')->email()->required(),
            TextInput::make('country')->label('Страна'),
            TextInput::make('age')->numeric()->label('Возраст'),
            FileUpload::make('avatar')
                ->label('Аватар')
                ->image()
                ->disk('public')
                ->directory('reviews'),
            TextInput::make('video_url')->label('Ссылка на видео'),
            Tabs::make('Переводы')->tabs([
                Tab::make('Русский')->schema([
                    Textarea::make('content_ru')->label('Отзыв (RU)')->required(),
                ]),
                Tab::make('English')->schema([
                    Textarea::make('content_en')->label('Review (EN)'),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Имя')->sortable()->searchable(),
            TextColumn::make('email')->label('Почта')->sortable()->searchable(),
            ImageColumn::make('Avatar')
                ->label('Аватар')
                ->disk('public')
                ->getStateUsing(fn ($record) => asset('storage/' . $record->avatar))
                ->circular(),
            TextColumn::make('translated_content')
                ->label('Отзыв (RU)')
                ->getStateUsing(fn ($record) => $record->getTranslatedContent()),
        ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit'   => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
