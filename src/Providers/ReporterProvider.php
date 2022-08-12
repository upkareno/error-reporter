<?php
namespace Upkareno\ErrorReporter\Providers;

use Illuminate\Support\ServiceProvider;
use Upkareno\ErrorReporter\PublishesMigrations;

class ReporterProvider extends ServiceProvider
{
    use PublishesMigrations;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->registerMigrations(__DIR__ . '/../database/migrations');
        // register commands
        $this->commands([
            \Upkareno\ErrorReporter\Commands\Reporter::class,
            \Upkareno\ErrorReporter\Commands\CreateReporter::class,
        ]);
    
    }
}
