<?php

/*
 * This file is part of Alt Three Badger.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\Badger\Render;

/**
 * This is the plastic render class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class PlasticRender extends AbstractRender
{
    /**
     * Return a list of supported formats by the render.
     *
     * @return string[]
     */
    public function getSupportedFormats()
    {
        return ['svg', 'plastic'];
    }

    /**
     * Returns the template contents.
     *
     * @return string
     */
    protected function getTemplate()
    {
        return 'plastic.svg';
    }
}
