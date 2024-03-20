<?php

namespace App\Filament\Resources\AdvertisementResource\RelationManagers;

use App\Filament\Resources\ProductResource;
use App\Models\Color;
use App\Models\Size;
use Filament\Forms;
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
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductsRelationManager extends RelationManager
{
    use HasWizard;

    protected static string $relationship = 'products';

    public function form(Form $form): Form
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
                                                    ->options(Color::query()->pluck('color_name','id'))
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

    public function table(Table $table): Table
    {
        return ProductResource::table($table)
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                ->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                ->preloadRecordSelect(),
            ]);
    }

    public function getSteps(): array
    {
        return [


        ];
    }

}
