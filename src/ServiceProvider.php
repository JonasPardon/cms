<?php declare(strict_types=1);

namespace JonasPardon\Cms;

use Illuminate\Support\ServiceProvider as LaravelSerivceProvider;

class ServiceProvider extends LaravelSerivceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    public function register()
    {

    }
}
