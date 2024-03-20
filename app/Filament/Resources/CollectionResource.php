<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColloectionResource\Pages;
use App\Filament\Resources\ColloectionResource\RelationManagers;
use App\Models\Collection;
use App\Models\Colloection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CollectionResource extends Resource
{
    protected static ?string $model = Collection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('collection_name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('collection_name')
                    ->searchable(),
                TextColumn::make('products_count')
                    ->counts('products')
                    ->searchable()
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
            'index' => CollectionResource\Pages\ManageCollections::route('/'),
        ];
    }
}
