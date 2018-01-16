<?php

namespace Takeoo\Translator;

use Illuminate\Support\ServiceProvider;

/**
 * Class TakeooServiceServiceProvider
 * @package Takeoo\Service
 */
class TakeooServiceServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    public function register()
    {
//
    }
}