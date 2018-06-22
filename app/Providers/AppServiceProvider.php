<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Log;
use Illuminate\Support\Facades\Schema;
use Blade;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::directive('admina', function($expression) {
            return "<?php ($expression != null) ? (in_array('manager', $expression->roles->pluck('name')->all())) : false; ?>";
        });
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
