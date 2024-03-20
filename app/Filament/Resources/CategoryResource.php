<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('category_name')
                    ->required()
                    ->maxLength(255),
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
                    ->visible(function (Forms\Get $get) {
                        $has_photo = $get('has_photo'); // Store the value of the `email` field in the `$email` variable.
                        return $has_photo;
                    }),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_name')
                    ->searchable()
                    ->sortable(true)
                    ->toggleable(),
                TextColumn::make('products_count')
                    ->counts('products')
                    ->label(__('labels.products_count'))
                    ->suffix('   '.__('objects.products'))
                    ->color(function ($record)
                    {
                        if($record->products_count==0){
                            return 'warning';
                        }
                        return ($record->products_count>10)?'success':'info';
                    })
                    ->icon(function ($record)
                    {
                        return ($record->products_count>5)?'heroicon-m-arrow-trending-up':'heroicon-m-arrow-trending-down';
                    })
                    ->sortable(true)
                    ->toggleable(),
                ImageColumn::make('media.path')
                    ->size(50)
                    ->toggleable(),
            ])
            ->filters([

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
            'index' => Pages\ManageCategories::route('/'),
        ];
    }
}
