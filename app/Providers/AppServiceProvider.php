<?php

namespace App\Providers;

use App\Models\Quizz;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    const BACKGROUND_COLOR_DEFAULT = '#45619D';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $quizz = Quizz::where('actif', 1)->first();
        
        if (!$quizz) {
            $backgroundColor = self::BACKGROUND_COLOR_DEFAULT;
        } else {
            $backgroundColor = $quizz->theme->color_nav;
        }

        view()->share('backgroundColor', $backgroundColor);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
