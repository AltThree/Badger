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

use AltThree\Badger\Exceptions\InvalidHexColorException;
use InvalidArgumentException;

/**
 * This is the badge class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class Badge
{
    /**
     * The left side of the badge.
     *
     * @var string
     */
    protected $subject;

    /**
     * The right side of the badge.
     *
     * @var string
     */
    protected $status;

    /**
     * The color of the badge.
     *
     * @var string
     */
    protected $color;

    /**
     * The format of the badge.
     *
     * @var string
     */
    protected $format;

    /**
     * The default colors to map strings to.
     *
     * @var array
     */
    protected $colorMap = [
        'brightgreen' => '4c1',
        'green'       => '97CA00',
        'yellow'      => 'dfb317',
        'yellowgreen' => 'a4a61d',
        'orange'      => 'fe7d37',
        'red'         => 'e05d44',
        'blue'        => '007ec6',
        'grey'        => '555',
        'gray'        => '555',
        'lightgrey'   => '9f9f9f',
        'lightgray'   => '9f9f9f',
    ];

    /**
     * The default format to render the badge as.
     *
     * @var string
     */
    const DEFAULT_FORMAT = 'flat-square';

    /**
     * Create a new badge instance.
     *
     * @param string      $subject
     * @param string      $status
     * @param string      $color
     * @param string|null $format
     *
     * @throws \AltThree\Badger\Exceptions\InvalidHexColorException
     *
     * @return void
     */
    public function __construct(string $subject, string $status, string $color, string $format = null)
    {
        $this->subject = htmlspecialchars($subject, ENT_XML1, 'UTF-8');
        $this->status = htmlspecialchars($status, ENT_XML1, 'UTF-8');
        $this->color = $this->getColorMapOrAsHex($color);
        $this->format = $format ?: static::DEFAULT_FORMAT;

        if (!$this->isValidHex($this->color)) {
            throw new InvalidHexColorException('The color argument "'.$this->color.'" is invalid.');
        }
    }

    /**
     * Generates a badge from a string format.
     *
     * Example: I_m-liuggio-yellow.svg
     *
     * @param string $format
     *
     * @return \AltThree\Badger\Badge
     */
    public static function fromString(string $format)
    {
        if (preg_match('/^(([^-]|--)+)-(([^-]|--)+)-(([^-]|--)+)\.(svg|png|gif|jpg)$/', $format, $match) === false && (7 != count($match))) {
            throw new InvalidArgumentException('The given format string is invalid: '.$format);
        }

        $subject = $match[1];
        $status = $match[3];
        $color = $match[5];
        $format = $match[7];

        return new self($subject, $status, $color, $format);
    }

    /**
     * Return the subject.
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Return the status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Return the color.
     *
     * @return string
     */
    public function getColor()
    {
        return ltrim($this->color, '#');
    }

    /**
     * Return the color with the prefixed #.
     *
     * @return string
     */
    public function getHexColor()
    {
        return '#'.$this->getColor();
    }

    /**
     * Return the format.
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Generate the badge as a string.
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s-%s-%s.%s',
            $this->subject,
            $this->status,
            $this->color,
            $this->format
        );
    }

    /**
     * Check if the color is within the color map, or return it as normal.
     *
     * @param string $color
     *
     * @return string
     */
    protected function getColorMapOrAsHex(string $color)
    {
        return isset($this->colorMap[$color]) ? $this->colorMap[$color] : $color;
    }

    /**
     * Determins if the given color is a valid hex code.
     *
     * @param string $color
     *
     * @return bool
     */
    protected function isValidHex(string $color)
    {
        $color = ltrim($color, '#'); // Strip the leading #

        return (bool) preg_match('/^[0-9a-fA-F]{3,6}$/', $color);
    }
}
