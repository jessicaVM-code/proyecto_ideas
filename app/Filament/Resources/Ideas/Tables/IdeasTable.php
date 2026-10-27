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
use Filament\Actions\Action;
use App\Models\Idea;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Textarea;


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
                    ->wrap()
                    ->searchable(),
                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->wrap()
                    ->searchable(),
                TextColumn::make('estado')
                    ->searchable(),
                TextColumn::make('autor')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('categoria.nombre')
                    ->toggleable(isToggledHiddenByDefault: true)
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
                Action::make('aprobar')->label('Aprobar')->icon(Heroicon::HandThumbUp)
                    ->color('success')->requiresConfirmation()
                    ->modalheading('Aprobación')->modalDescription('¿Deseas aprobar esa idea?')
                    ->action(function (Idea $record){
                        $record->update([
                            'estado' => 'aprobada',
                            'observacion' => null,
                        ]);

                        Notification::make()
                            ->title('Idea aprobada correctamente')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (Idea $record) => $record->estado !== 'aprobada'),
                Action::make('rechazar')->label('Rechazar')
                    ->icon(Heroicon::HandThumbDown)
                    ->color('danger')->requiresConfirmation()
                    ->modalheading('Rechazar')->modalDescription('¿Deseas rechazar esa idea?')
                    ->schema([
                        Textarea::make('observacion')
                            ->label('Motivo del rechazo')
                            ->required()
                            ->maxLength(200),
                        ]
                    )
                    ->action(function (Idea $record, array $data){
                        $record->update([
                            'estado' => 'rechazada',
                            'observacion' => $data['observacion'],
                            ]);

                        Notification::make()
                            ->title('Idea rechazar correctamente')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (Idea $record) => $record->estado !== 'rechazada')

            ])
            ->recordUrl(null)
            ->recordAction(null)
            ->toolbarActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                ]),
            ]);
    }
}
