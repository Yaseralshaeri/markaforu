<?php

namespace App\Livewire;

use App\Models\FollowUpStatus;
use App\Models\Image;
use App\Models\Media;
use App\Models\Platform;
use App\Models\Section;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ViewImages extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Media::query())
            ->columns([
                TextColumn::make('media_name'),/*
                TextColumn::make('image_type'),
                TextColumn::make('comment'),*/
                ImageColumn::make('path')
                    ->size(50)
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()
                    ->model(Image::class)
                    ->form([
                        TextInput::make('media_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('media_description')
                            ->required()
                            ->maxLength(255),
                        Select::make('media_type')
                            ->options([
                                'carousel'=>'اعلان',
                                'ads'=>'اعلان',
                                'logo'=>'logo',
                                'header'=>'راس صفحة',
                                'index_types'=>'انواع الصفحة الرئيسية',
                            ]),
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
                    ])
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ])
            ->headerActions([
                \Filament\Tables\Actions\CreateAction::make()
                    ->model(Media::class)
                    ->form([
                        TextInput::make('media_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('media_description')
                            ->required()
                            ->maxLength(255),
                        Select::make('media_type')
                            ->options([
                                'carousel'=>'سلايد',
                                'ads'=>'اعلان',
                                'logo'=>'logo',
                                'header'=>'راس صفحة',
                                'index_types'=>'انواع واقسام الصفحة الرئيسية',
                            ]),
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
                    ])
            ]);
    }

    public function render(): View
    {
        return view('livewire.view-images');
    }
}
