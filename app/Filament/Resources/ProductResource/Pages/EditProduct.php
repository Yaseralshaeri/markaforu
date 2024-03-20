<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Color;
use App\Models\Size;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\EditRecord;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getRedirectUrl(): string
    {
        return ProductResource::getUrl();
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    use EditRecord\Concerns\HasWizard;

    public function getSteps(): array
    {
        return [
            Step::make('Order')
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
            Step::make('Statistics')
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
           Step::make('Images')
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
            Step::make('Tags')
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

        ];
    }
}
