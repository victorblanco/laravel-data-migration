<?php
namespace VictorBlanco\DBtoMigration;

use Illuminate\Support\ServiceProvider;

class DbtoMigrationProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(dirname(__DIR__).'/resources/views/', 'dbtomigration');

        $this->publishes([
            dirname(__DIR__).'/resources/config/dbtomigration.php' => config_path('dbtomigration.php'),
        ]);

        $this->commands(
            DBtoMigration::class
        );
    }
}

