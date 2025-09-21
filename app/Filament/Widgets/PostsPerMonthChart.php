<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Post;
use Carbon\Carbon;

class PostsPerMonthChart extends ChartWidget
{
    protected static ?string $heading = 'Posts per Month';

    protected function getData(): array
    {
        $posts = Post::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $labels = [];
        $data = [];

        foreach (range(1, 12) as $m) {
            $labels[] = Carbon::create()->month($m)->shortMonthName;
            $data[] = $posts[$m] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Posts',
                    'data' => $data,
                    'backgroundColor' => '#3b82f6', // biru
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'onClick' => 'function(evt, elements) {
            if (elements.length > 0) {
                let chart = elements[0].element.$context.chart;
                let index = elements[0].index;
                let label = chart.data.labels[index];
                let month = new Date(Date.parse(label +" 1, 2023")).getMonth() + 1;

                // redirect ke tabel Posts di Filament admin dengan filter bulan
                window.open(`/admin/posts?tableFilters[month]=${month}`, "_self");
            }
        }',
        ];
    }
}
