<?php

namespace Murattcann\SendgridMailer;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SendgridMailerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__. "/config/sendgrid_credentials.php", "sendgrid-mailer-cnofig");
         
        $this->publishes([
            __DIR__."/config/sendgrid_credentials.php" => config_path("sendgrid_credentials.php")
        ],"sendgridmailer-config");
    }
}
