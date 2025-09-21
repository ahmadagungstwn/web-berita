<?php

namespace App\Providers;

use App\Models\Post;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            $archives = Post::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')
                ->groupBy('year', 'month')
                ->orderByRaw('MIN(created_at) DESC')
                ->get()
                ->map(function ($date) {
                    return [
                        'year' => $date->year,
                        'month' => $date->month,
                        'month_name' => \Carbon\Carbon::create()->month($date->month)->format('F'),
                    ];
                });

            $view->with('archives', $archives);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
