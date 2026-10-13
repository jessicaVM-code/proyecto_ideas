<?php

namespace App\Filament\Resources\Ideas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use App\Helpers\EstadoIdea;

class IdeaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->label('Titulo de la idea')
                    ->helperText('Escribe un título que sea ilustrativo y breve')
                    ->placeholder('Ej Aplicación de comida')
                    ->required(),
                Textarea::make('descripcion')
                    ->label('Describe tu idea')
                    ->helperText('Describe a detalle en que consiste la idea del proyecto')
                    ->required()
                    ->columnSpanFull(),
                Select::make('estado')
                    ->required()
                    ->options(EstadoIdea::opciones())
                    ->default('registrada'),
                TextInput::make('autor')
                    ->required(),
                Select::make('categoria_id')
                    ->relationship('categoria', 'nombre')
                    ->required(),
            ]);
    }
}
