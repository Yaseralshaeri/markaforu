<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
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

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('media_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('media_description')
                    ->required()
                    ->maxLength(255),
                Select::make('mediable_type')
                    ->options([
                        'heroCarousel'=>'اعلان سلايدر ',
                        'Banner_index'=>'banner',
                        'logo'=>'logo',
                        'header'=>'راس صفحة',
                    ])
                ->native(false),
                /*
                Select::make('sub_category')
                    ->options(fn (Forms\Get $get): array => match ($get('mediable_type')) {
                        'header' => [
                            'page_header' => '',
                        ],
                        'ads' => [
                            'banner_ad' => 'اعلان لوحة Banner',
                            'usually_ad' => 'اعلان عرض  ثابت',
                            'sidebar_ad' => 'اعلان جانب ',
                        ],
                        default => [],
                    }),*/
                FileUpload::make('path')
                    ->multiple()
                    ->image()
                    ->imageEditor()
                    ->directory('template')
                    // ->acceptedFileTypes(['application/pdf'])
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                            ->prepend('custom-prefix-'),
                    )
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('media_name'),/*
                TextColumn::make('image_type'),
                TextColumn::make('comment'),*/
                ImageColumn::make('path')
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
            'index' => Pages\ManageMedia::route('/'),
        ];
    }
}
