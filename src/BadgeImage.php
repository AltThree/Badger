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
    /**
     * The content of the image.
     *
     * @var string
     */
    protected $content;

    /**
     * The format of the image.
     *
     * @var string
     */
    protected $format;

    /**
     * Create a new badge image instance.
     *
     * @param string $content
     * @param string $format
     *
     * @return void
     */
    public function __construct(string $content, string $format)
    {
        $this->content = $content;
        $this->format = $format;
    }

    /**
     * Returns the content of the badge image as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->content;
    }

    /**
     * Creates a new badge image from a given string.
     *
     * @param string $content
     * @param string $format
     *
     * @return \AltThree\Badger\BadgeImage
     */
    public static function createFromString(string $content, string $format)
    {
        return new self($content, $format);
    }

    /**
     * Returns the format of the image.
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }
}
