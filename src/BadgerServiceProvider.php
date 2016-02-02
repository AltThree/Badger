<?php

/*
 * This file is part of Alt Three Badger.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\Badger;

use AltThree\Badger\Render\FlatSquareRender;
use AltThree\Badger\Render\PlasticFlatRender;
use AltThree\Badger\Render\PlasticRender;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

/**
 * This is the badger service provider class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class BadgerServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBadger();
    }

    /**
     * Register the parser class.
     *
     * @return void
     */
    protected function registerBadger()
    {
        $this->app->singleton(Badger::class, function (Container $app) {
            $renderers = [
                new PlasticRender(),
                new PlasticFlatRender(),
                new FlatSquareRender(),
            ];

            return new Badger($renderers);
        });

        $this->app->singleton('badger', Badger::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'badger',
        ];
    }
}
