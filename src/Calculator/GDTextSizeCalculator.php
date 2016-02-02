<?php

/*
 * This file is part of Alt Three Badger.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\Badger\Calculator;

/**
 * This is the gd text size calculator class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class GDTextSizeCalculator implements TextSizeCalculatorInterface
{
    /**
     * The path to the font file.
     *
     * @var string
     */
    protected $fontPath;

    /**
     * The font that we're using.
     *
     * @var string
     */
    const TEXT_FONT = './Font/DejaVuSans.ttf';

    /**
     * Create a new gd text size calculator instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fontPath = __DIR__.'/'.self::TEXT_FONT;
    }

    /**
     * Calculate the width of the text box.
     *
     * @param string $text
     * @param int    $size
     *
     * @return float
     */
    public function calculateWidth($text, $size = self::TEXT_SIZE)
    {
        $size = round($size * 0.75, 1);
        $box = imagettfbbox($size, 0, $this->fontPath, $text);

        return round(abs($box[2] - $box[0]) + self::SHIELD_PADDING_EXTERNAL + self::SHIELD_PADDING_INTERNAL, 1);
    }
}
