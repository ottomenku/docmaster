<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Tools\MHtml;

class MHtmlServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('MHtml', function () {
            return new MHtml;
        });
  
    }
}


