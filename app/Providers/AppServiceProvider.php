<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Contacto;
use App\Models\Etiqueta;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view) {
            $view->with([
                'contactos_cant' => Contacto::count(),
                'etiquetas' => Etiqueta::all(),
            ]);
        });
    }
}
