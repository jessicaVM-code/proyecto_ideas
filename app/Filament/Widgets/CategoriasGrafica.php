<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Categoria;

class CategoriasGrafica extends ChartWidget
{
    protected ?string $heading = 'Categorias Grafica';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $categorias = Categoria::withCount('ideas')->get();

        $nombres = [];
        $cantidades = [];

        foreach ($categorias as $categoria) {
            $nombres[] = $categoria->nombre;
            $cantidades[] = $categoria->ideas_count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Cantidad de ideas',
                    'data' => $cantidades,
                     'backgroundColor' => [
                        '#6366F1',
                        '#F59E0B',
                        '#10B981',
                        '#EC4899',
                    ],
                ],
            ],
            'labels' => $nombres,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
