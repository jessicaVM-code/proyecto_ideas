<?php

namespace App\Filament\Resources\Categorias\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoriaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre de categoria')
                    ->helperText('Ingresa el nombre de la de categoria')
                    ->placeholder('Ej Categoria')
                    ->required(),  //campo requerido
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->required()
                    ->helperText('Ingresa una descripción completa')
                    ->columnSpanFull(),
            ]);
    }
}
