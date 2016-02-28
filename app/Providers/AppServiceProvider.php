<?php

namespace App\Providers;

use App\Models\Quizz;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    const BACKGROUND_COLOR_DEFAULT = '#0277bd';
    const BTN_COLOR_DEFAULT = '#337ab7';

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
            $btnColor = self::BTN_COLOR_DEFAULT;
        } else {
            $backgroundColor = $quizz->theme->color_nav;
            $btnColor = $quizz->theme->color_elements;
        }

        view()->share('backgroundColor', $backgroundColor);
        view()->share('btnColor', $btnColor);
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
