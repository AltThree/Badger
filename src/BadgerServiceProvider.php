<?php

declare(strict_types=1);

/*
 * This file is part of Alt Three Badger.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\Badger;

use AltThree\Badger\Calculator\GDTextSizeCalculator;
use AltThree\Badger\Calculator\TextSizeCalculatorInterface;
use AltThree\Badger\Render\FlatSquareRender;
use AltThree\Badger\Render\PlasticFlatRender;
use AltThree\Badger\Render\PlasticRender;
use AltThree\Badger\Render\SocialRender;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

/**
 * This is the badger service provider class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class BadgerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCalculator();
        $this->registerBadger();
    }

    /**
     * Register the calculator class.
     *
     * @return void
     */
    protected function registerCalculator()
    {
        $this->app->singleton(TextSizeCalculatorInterface::class, function () {
            $path = __DIR__.'/../resources/fonts/DejaVuSans.ttf';

            return new GDTextSizeCalculator(realpath($path));
        });

        $this->app->singleton('badger.calculator', TextSizeCalculatorInterface::class);
    }

    /**
     * Register the badger class.
     *
     * @return void
     */
    protected function registerBadger()
    {
        $this->app->singleton(Badger::class, function (Container $app) {
            $calculator = $app->make('badger.calculator');
            $path = realpath(__DIR__.'/../resources/templates');

            $renderers = [
                new PlasticRender($calculator, $path),
                new PlasticFlatRender($calculator, $path),
                new FlatSquareRender($calculator, $path),
                new SocialRender($calculator, $path),
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
            'badger.calculator',
        ];
    }
}
