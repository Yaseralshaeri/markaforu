<?php

namespace App\Livewire;


use Filament\Actions\CreateAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ViewColors extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Color::query())
            ->columns([
                TextColumn::make('color_name')
                    ->label(__('labels.status'))
                    ->badge()
                    ->color(function ($record){
                        return Color::hex($record->color_hex);
                    }),
                ColorColumn::make('color_hex'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()
                    ->model(\App\Models\Color::class)
                    ->form([
                        TextInput::make('color_name')
                            ->required()
                            ->maxLength(255),
                        ColorPicker::make('color_hex')
                            ->label('color')
                            ->translateLabel()
                            ->required()
                    ])
            ])
            ->bulkActions([
                DeleteBulkAction::make()
            ])
            ->headerActions([
                \Filament\Tables\Actions\CreateAction::make()
                    ->model(\App\Models\Color::class)
                    ->form([
                        TextInput::make('color_name')
                            ->required()
                            ->maxLength(255),
                        ColorPicker::make('color_hex')
                            ->label('color')
                            ->translateLabel()
                            ->required()
                    ])
            ]);
    }

    public function render(): View
    {
        return view('livewire.view-colors');
    }
}
