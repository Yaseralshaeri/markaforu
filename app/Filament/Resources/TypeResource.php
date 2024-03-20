<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeResource\Pages;
use App\Filament\Resources\TypeResource\RelationManagers;
use App\Models\Categories_sections;
use App\Models\Type;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class TypeResource extends Resource
{
    protected static ?string $model = Type::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('labels.type'))
                    ->description(__('labels.type_data'))
                    ->schema([
                        Forms\Components\TextInput::make('type_name')
                            ->required()
                            ->maxLength(255),
                        Select::make('categories')
                            ->relationship('categories','category_name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->multiple()
                            ->native(false),
                        Forms\Components\Toggle::make('has_photo')
                            ->inline()
                            ->live()
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Fieldset::make()
                            ->relationship('media')
                            ->schema([
                                Forms\Components\FileUpload::make('path')
                                    ->multiple()
                                    ->image()
                                    ->imageEditor()
                                    ->directory('template')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                            ->prepend('custom-prefix-'),
                                    )
                                    ->columnSpanFull(),
                                Select::make('show_in')
                                    ->options([
                                        '0'=>'لاشئ',
                                        '1'=>'صفحة رئيسية',
                                        '2'=>'راس صفحة',
                                        '3'=>'انواع الصفحة الرئيسية',
                                    ])
                                    ->native(false),
                                TextInput::make('media_name')
                                    ->maxLength(255)
                            ])
                            ->hidden(fn (Forms\Get $get): bool => !$get('has_photo')),
                    ])->columns(2),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.category_name')
                    ->searchable(),
                ImageColumn::make('media.path')
                    ->size(50)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTypes::route('/'),
        ];
    }
}
