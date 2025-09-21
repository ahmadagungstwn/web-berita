<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use App\Models\Post;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Authors', Author::count())
                ->description('Jumlah penulis terdaftar')
                ->descriptionIcon('heroicon-o-user-circle')
                ->color('success')
                ->url(route('filament.admin.resources.authors.index')),

            Stat::make('Total Posts', Post::count())
                ->description('Jumlah artikel yang ada')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('primary')
                ->url(route('filament.admin.resources.posts.index')),

            Stat::make('Total Categories', Category::count())
                ->description('Jumlah kategori konten')
                ->descriptionIcon('heroicon-o-folder-open')
                ->color('warning')
                ->url(route('filament.admin.resources.categories.index')),
        ];
    }
}
