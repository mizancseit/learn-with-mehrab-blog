<?php

namespace App\Providers;

use App\Models\AboutCompany;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        if (Schema::hasTable('about_companies')) {
            $about_company = AboutCompany::all()->first();
            View::share('about_company', $about_company);
        }

        Blade::directive('auth_access', function ($expression) {
            return "<?php if (in_array($expression,auth()->user()->getDirectPermissions()->pluck('name')->toArray())) { ?>";
        });

        Blade::directive('end_auth_access', function () {
            return '<?php } ?>';
        });
    }
}
