<?php

namespace App\Livewire;

use App\Models\Catgeory_type;
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
use Filament\Forms\Set;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ViewCategoriesTypes extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Catgeory_type::query())
            ->columns([
                TextColumn::make('category.category_name')
                    ->alignment(Alignment::End),
                TextColumn::make('type.type_name')
                    ->alignment(Alignment::Start),
                ImageColumn::make('media.path')
                    ->size(50)
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()
                    ->model(Catgeory_type::class)
                    ->form([
                        Select::make('type')
                            ->relationship(name: 'type', titleAttribute: 'type_name')
                            ->native(false)
                            ->live(),
                        Select::make('category')
                            ->relationship('category','category_name')
                            /*->afterStateUpdated(function (Get $get,Set $set, ?string $state) {
                                $state=$state.$get('type');
                                $set('media_name', Str::slug($state));
                            })*/
                            ->native(false)
                        ->live(),
                        \Filament\Forms\Components\Fieldset::make()
                            ->relationship('media')
                            ->schema([
                                FileUpload::make('path')
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

                            ])
                    ])
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ])
            ->headerActions([
                \Filament\Tables\Actions\CreateAction::make()
                    ->model(Catgeory_type::class)
                    ->form([
                        TextInput::make('title')
                            ->live()
                            ->afterStateUpdated(function (Get $get,Set $set, ?string $state) {
                                $state=$state.$get('titlee');
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('titlee')
                            ->afterStateUpdated(function (Get $get,Set $set, ?string $state) {
                                $state=$state.$get('title');
                                $set('slug', Str::slug($state));
                            })
                            ->live()
,                              TextInput::make('slug')
                    ])
            ]);
    }

    public function render(): View
    {
        return view('livewire.view-categories-types');
    }
}
