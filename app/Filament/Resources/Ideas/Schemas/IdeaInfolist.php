<?php

namespace App\Filament\Resources\Ideas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

class IdeaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('titulo')
                    ->hiddenLabel()
                    ->size(TextSize::Large)
                    ->weight(FontWeight::Bold)
                    ->columnSpanFull(),
               
                TextEntry::make('descripcion')
                    ->label('Descripción')
                    ->inlineLabel(),


                TextEntry::make('autor')
                    ->label('Autor')
                    ->inlineLabel(),


                TextEntry::make('categoria.nombre')
                    ->label('Categoría')
                    ->inlineLabel(),


                TextEntry::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aprobada' => 'success',
                        'en revisión' => 'warning',
                        'rechazada' => 'danger',
                        'registrada' => 'info',
                        default => 'gray',
                    })
                    ->inlineLabel(),


                TextEntry::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime('d/m/Y')
                    ->inlineLabel(),


                TextEntry::make('updated_at')
                    ->label('Última actualización')
                    ->dateTime('d/m/Y')
                    ->inlineLabel(),
            ])
            ->columns(1);

    }
}
