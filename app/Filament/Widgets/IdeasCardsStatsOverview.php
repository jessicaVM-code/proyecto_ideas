<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Idea;
use App\Models\Categoria;

class IdeasCardsStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $registradas = Idea::where('estado', 'registrada')->count();
        $revision = Idea::where('estado', 'en revisión')->count();
        $aprobadas = Idea::where('estado', 'aprobada')->count();
        $rechazadas = Idea::where('estado', 'rechazada')->count();

        return [
            Stat::make('Total de ideas', Idea::count())->icon('heroicon-s-light-bulb')
             ->description( "Registradas: $registradas | " . "En revisión: $revision | " . "Aprobadas: $aprobadas | " . "Rechazadas: $rechazadas"),

            Stat::make('Total de categorias', Categoria::count())->icon('heroicon-s-tag'),
        ];
    }
}
