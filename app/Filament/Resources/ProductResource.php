<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Size;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\Tabs\Tab;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductResource extends Resource
{
    use HasWizard;
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Order')
                        ->schema([
                            Section::make()
                                ->schema([
                                    TextInput::make('product_name')
                                        ->required()
                                        ->maxLength(255),
                                    Select::make('categories')
                                        ->relationship('categories','category_name')
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->multiple()
                                        ->native(false),
                                    /*Select::make('type_id')
                                        ->relationship('type','type_name')
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->native(false),
                                    Select::make('institution_id')
                                        ->relationship('institution','institution_name')
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->native(false),*/
                                    Select::make('brand_id')
                                        ->relationship('brand','brand_name')
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->native(false),
                                    TextInput::make('keyword')
                                        ->required(),
                                ])->columns(2),
                        ])->columns(1),
                    Wizard\Step::make('Statistics')
                        ->schema([
                            Section::make()
                                ->schema([
                                    TextInput::make('old_price')
                                        ->required()
                                    ,
                                    TextInput::make('new_price')
                                        ->required()
                                    ,
                                    TextInput::make('quantity')
                                        ->required()
                                        ->numeric(),
                                    Select::make('sizes')
                                        ->relationship('sizes','size')
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->multiple()
                                        ->native(false),
                                ])->columns(2),
                        ]),
                    Wizard\Step::make('Images')
                        ->schema([
                            Repeater::make(__('images'))
                                ->relationship('images')
                                ->schema([
                                    FileUpload::make('path')
                                        ->image()
                                        ->imageEditor()
                                        ->directory('products')
                                        ->multiple()
                                        ->getUploadedFileNameForStorageUsing(
                                            fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                                ->prepend('custom-prefix-'),
                                        )
                                        ->columnSpanFull(),
                                    Select::make('color_id')
                                        ->options(\App\Models\Color::query()->pluck('color_name','id'))
                                        // ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->native(false)
                                        ->columns(1)
                                    ,
                                    Select::make('size')
                                        ->options(Size::query()->pluck('size','size'))
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->multiple()
                                        ->native(false)
                                        ->columns(1),
                                    Toggle::make('showed')
                                        ->onColor('success')
                                        ->offColor('danger')

                                ])->grid()
                        ]),
                    Wizard\Step::make('Tags')
                        ->schema([
                            Textarea::make('description')
                                ->required()
                                ->columnSpanFull(),
                            TagsInput::make('tags')
                                ->suggestions([
                                    'tailwindcss',
                                    'alpinejs',
                                    'laravel',
                                    'livewire',
                                ]),
                        ]),

                ])
                ->columnSpanFull()
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_name')
                    ->label(__('labels.product_name'))
                    ->sortable(true)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('old_price')
                    ->label(__('labels.old_price'))
                    ->numeric()
                    ->sortable(true)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('new_price')
                    ->label(__('labels.new_price'))
                    ->numeric()
                    ->sortable(true)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label(__('labels.quantity'))
                    ->numeric()
                    ->sortable(true)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('sizes.size')
                    ->label(__('labels.size'))
                    ->sortable(true)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('categories.category_name')
                    ->label(__('labels.category_name'))
                    ->sortable(true)
                    ->searchable()
                    ->toggleable(),
                /*Tables\Columns\TextColumn::make('type.type_name')
                    ->label(__('labels.type_name'))
                    ->numeric()
                    ->sortable(true)
                    ->searchable()
                    ->toggleable(),*/
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('labels.user_name'))
                    ->numeric()
                    ->sortable(true)
                    ->searchable()
                    ->toggleable()
                    ->toggleable(isToggledHiddenByDefault:true),
              /*  Tables\Columns\TextColumn::make('institution.institution_name')
                    ->label(__('labels.institution_name'))
                    ->numeric()
                    ->sortable(true)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault:true),*/
                Tables\Columns\TextColumn::make('brand.brand_name')
                    ->label(__('labels.brand_name'))
                    ->sortable(true)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault:true),
                    ImageColumn::make('image.path')
                    ->size(50),
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
                SelectFilter::make('category')
                    ->label(__('labels.category'))
                    ->relationship('categories','category_name')
                    ->searchable()
                    ->preload(),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                            ->label(__('labels.created_from')),
                        DatePicker::make('created_until')
                            ->label(__('labels.created_until')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                SelectFilter::make('size')
                    ->label(__('labels.size'))
                    ->relationship('sizes','size')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\ReplicateAction::make()
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
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Tabs::make('Tabs')
                   ->tabs([
                        Tab::make('Product Data')
                            ->icon('heroicon-m-bell')
                            ->schema([
                                 TextEntry::make('product_name'),
                                TextEntry::make('categories.category_name')
                                  ->label(__('labels.category_name')),
                                TextEntry::make('brand.brand_name')
                                    ->label(__('labels.brand_name')),
                                TextEntry::make('quantity')
                                 ->label(__('labels.quantity')),
                                TextEntry::make('old_price')
                                    ->label(__('labels.old_price')),
                                TextEntry::make('new_price')
                                    ->label(__('labels.new_price')),
                                TextEntry::make('sizes.size')
                                    ->label(__('labels.size')),
                                TextEntry::make('images.color.color_name'),
                                ColorEntry::make('images.color.color_hex'),
                                TextEntry::make('user.name')
                                    ->label(__('labels.user_name')),
                                TextEntry::make('created_at'),

                            ])->columns(3),

                        Tab::make('Notifications')
                            ->icon('heroicon-m-bell')
                            ->schema([
                                ImageEntry::make('image.path')
                            ]),
                    ])->columnSpanFull()


            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AdvertisementsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}/view'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),


        ];
    }
}
