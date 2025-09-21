<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class PostsPerCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Posts per Category';

    protected function getData(): array
    {
        $categories = Category::withCount('posts')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Posts by Category',
                    'data' => $categories->pluck('posts_count')->toArray(),
                    'backgroundColor' => [
                        '#f87171', // merah
                        '#34d399', // hijau
                        '#60a5fa', // biru
                        '#fbbf24', // kuning
                        '#a78bfa', // ungu
                        '#f472b6', // pink
                    ],
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
