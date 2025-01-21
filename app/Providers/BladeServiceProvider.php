<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::directive('lastFolders', function ($path) {
            return "<?php echo \App\Helpers\BladeHelper::lastFolders($path); ?>";
        });

        Blade::directive('iconForFile', function ($path) {
            return "<?php echo \App\Helpers\BladeHelper::iconForFile($path); ?>";
        });
    }

    public function register(): void
    {
        // Nothing needed here for Blade directives.
    }
}
