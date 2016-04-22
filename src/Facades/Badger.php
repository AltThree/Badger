<?php

/*
 * This file is part of Alt Three Badger.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\Badger\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the badger facade class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class Badger extends Facade
{
    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'badger';
    }
}
