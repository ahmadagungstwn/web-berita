<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            $driver = DB::getDriverName();

            if ($driver === 'sqlite') {
                $archives = Post::selectRaw('strftime("%Y", created_at) AS year, strftime("%m", created_at) AS month, MIN(created_at) AS min_date')
                    ->groupBy('year', 'month')
                    ->orderByRaw('MIN(created_at) DESC')
                    ->get()
                    ->map(function ($date) {
                        $carbonDate = Carbon::parse($date->min_date);

                        return [
                            'year'       => $date->year,
                            'month'      => (int) $date->month,
                            'month_name' => $carbonDate->format('F'),
                        ];
                    });
            } else {
                $archives = Post::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, MIN(created_at) as min_date')
                    ->groupBy('year', 'month')
                    ->orderByRaw('MIN(created_at) DESC')
                    ->get()
                    ->map(function ($date) {
                        $carbonDate = Carbon::parse($date->min_date);

                        return [
                            'year'       => $date->year,
                            'month'      => (int) $date->month,
                            'month_name' => $carbonDate->format('F'),
                        ];
                    });
            }

            $view->with('archives', $archives);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
