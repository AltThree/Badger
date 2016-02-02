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

use AltThree\Badger\Badge;

/**
 * This is the render interface.
 *
 * @author James Brooks <james@alt-three.com>
 */
interface RenderInterface
{
    /**
     * Render a badge.
     *
     * @param \AltThree\Badger\Badge $badge
     *
     * @return \AltThree\Badger\BadgeImage
     */
    public function render(Badge $badge);

    /**
     * Return a list of supported formats by the render.
     *
     * @return string[]
     */
    public function getSupportedFormats();
}
