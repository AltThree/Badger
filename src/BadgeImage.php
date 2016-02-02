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

/**
 * This is the badge image class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class BadgeImage
{
    protected $content;

    protected $format;

    public function __construct($content, $format)
    {
        $this->content = $content;
        $this->format = $format;
    }

    public function __toString()
    {
        return (string) $this->content;
    }

    public static function createFromString($content, $format)
    {
        return new self($content, $format);
    }

    public function getFormat()
    {
        return $this->format;
    }
}
