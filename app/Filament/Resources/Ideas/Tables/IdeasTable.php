<?php

namespace App\Filament\Resources\Ideas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class IdeasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                    fn (Builder $query) => $query->withoutGlobalScopes([
                        SoftDeletingScope::class,
                    ])
                )
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->searchable(),
                TextColumn::make('titulo')
                    ->label('Idea')
                    ->searchable(),
                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable(),
                TextColumn::make('estado')
                    ->searchable(),
                TextColumn::make('autor')
                    ->searchable(),
                TextColumn::make('categoria.nombre')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('estado')
                    ->options([
                        'registrada' => 'Registrada',
                        'en revision' => 'En revision',
                        'aprobada' => 'Aprobada',
                        'rechazada' => 'Rechazada',
                    ]),
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make()->modalHeading(''),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteaction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
