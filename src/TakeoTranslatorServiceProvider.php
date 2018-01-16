<?php

namespace Takeoo\Translator;

use Illuminate\Support\ServiceProvider;

/**
 * Class TakeooTranslatorServiceProvider
 * @package Takeoo\Service
 */
class TakeooTranslatorServiceProvider extends ServiceProvider
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