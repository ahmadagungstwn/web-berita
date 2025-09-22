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
            $archives = Post::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, MIN(created_at) as min_date')
                ->groupBy('year', 'month')
                ->orderByRaw('MIN(created_at) DESC')
                ->get()
                ->map(function ($date) {
                    $carbonDate = \Carbon\Carbon::parse($date->min_date);

                    return [
                        'year'       => $date->year,
                        'month'      => (int) $date->month,
                        'month_name' => $carbonDate->format('F'), // otomatis nama bulan
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
