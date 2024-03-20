<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvertisementResource\Pages;
use App\Filament\Resources\AdvertisementResource\RelationManagers\ProductsRelationManager;
use App\Models\Advertisement;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class AdvertisementResource extends Resource
{
    protected static ?string $model = Advertisement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('labels.Date'))
                    ->schema([
                        Forms\Components\TextInput::make('ads_name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ads_link')
                            ->maxLength(255),
                        Select::make('ads_type')
                            ->options([
                                'banner_ad' => 'اعلان لوحة Banner',
                                'top_ad' => 'اعلان راس قائمة',
                            ])
                            ->native(false),

                        Section::make(__('labels.Date'))
                            ->schema([
                                DateTimePicker::make('ads_start')
                                    ->label(__('labels.start_date'))
                                    ->before('ads_exp')
                                    ->native(false)
                                    ->minDate(now())
                                    ->visibleOn('create')
                                    ->prefix('Starts'),
                                DateTimePicker::make('ads_start')
                                    ->label(__('labels.start_date'))
                                    ->before('expiry_date')
                                    ->native(false)
                                    ->visibleOn('update')
                                    ->prefix('Starts'),
                                DateTimePicker::make('ads_exp')
                                    ->label(__('labels.expiry_date'))
                                    ->after('ads_start')
                                    ->native(false)
                                    ->prefix('Expire'),
                            ])->columns(2),
                        \Filament\Forms\Components\Fieldset::make()
                            ->label(__('labels.media'))
                            ->relationship('media')
                            ->schema([
                                Forms\Components\FileUpload::make('path')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('template')
                                    ->getUploadedFileNameForStorageUsing(
                                        fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                            ->prepend('custom-prefix-'),
                                    )
                                    ->columnSpanFull(),
                               /* Select::make('show_in')
                                    ->options([
                                        '0'=>'لاشئ',
                                        '1'=>'صفحة رئيسية',
                                        '2'=>'راس صفحة',
                                        '3'=>'انواع الصفحة الرئيسية',
                                    ])
                                    ->native(false),*/
                                TextInput::make('media_name')
                                    ->maxLength(255)

                            ]),
                        Forms\Components\TextArea::make('note')
                            ->maxLength(255)
                             ->columnSpanFull(),
                    ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ads_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ads_start')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ads_exp')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ads_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ads_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ads_public_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('note')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdvertisements::route('/'),
            'create' => Pages\CreateAdvertisement::route('/create'),
            'edit' => Pages\EditAdvertisement::route('/{record}/edit'),
        ];
    }
}
