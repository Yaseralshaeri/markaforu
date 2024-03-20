<?php

namespace App\Livewire;

use App\Models\Categories_sections;
use App\Models\Catgeory_type;
use App\Models\FollowUpStatus;
use App\Models\Image;
use App\Models\Media;
use App\Models\Platform;
use App\Models\Section;
use App\Models\Size;
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
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ViewSize extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Size::query())
            ->columns([
                TextColumn::make('size')
                ->searchable()
                ->sortable()
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()
                    ->model(Size::class)
                    ->form([
                        TextInput::make('size')
                            ->required()
                             ->unique()
                    ])
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ])
            ->headerActions([
                \Filament\Tables\Actions\CreateAction::make()
                    ->model(Size::class)
                    ->form([
                        TextInput::make('size')
                            ->required()
                            ->unique()
                    ])
            ]);
    }

    public function render(): View
    {
        return view('livewire.view-size');
    }
}
