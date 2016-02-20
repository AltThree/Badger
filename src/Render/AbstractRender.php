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
use AltThree\Badger\BadgeImage;
use AltThree\Badger\Calculator\TextSizeCalculatorInterface;

/**
 * This is the abstract render class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
abstract class AbstractRender implements RenderInterface
{
    /**
     * The text size calculator instance.
     *
     * @var \AltThree\Badger\Calculator\TextSizeCalculatorInterface
     */
    protected $calculator;

    /**
     * The path to the template folder.
     *
     * @var string
     */
    protected $path;

    /**
     * The vendor color of the badge.
     *
     * @var string
     */
    protected $color;

    /**
     * Create a new svg render instance.
     *
     * @param \AltThree\Badger\Calculator\TextSizeCalculatorInterface $calculator
     * @param string                                                  $path
     * @param string|null                                             $color
     *
     * @return void
     */
    public function __construct(TextSizeCalculatorInterface $calculator, $path, $color = null)
    {
        $this->calculator = $calculator;
        $this->path = $path;
        $this->color = $color ?: '#555555';
    }

    /**
     * Render a badge.
     *
     * @param \AltThree\Badger\Badge $badge
     *
     * @return \AltThree\Badger\BadgeImage
     */
    public function render(Badge $badge)
    {
        $subjectWidth = $this->stringWidth($badge->getSubject());
        $statusWidth = $this->stringWidth($badge->getStatus());

        $params = [
            'vendorWidth'         => $subjectWidth,
            'valueWidth'          => $statusWidth,
            'totalWidth'          => $subjectWidth + $statusWidth,
            'vendorColor'         => $this->color,
            'valueColor'          => $badge->getHexColor(),
            'vendor'              => $badge->getSubject(),
            'value'               => $badge->getStatus(),
            'vendorStartPosition' => round($subjectWidth / 2, 1) + 1,
            'valueStartPosition'  => $subjectWidth + round($statusWidth / 2, 1) - 1,
        ];

        return $this->renderSvg($params, $badge->getFormat());
    }

    /**
     * Returns the string width.
     *
     * @return float
     */
    protected function stringWidth($text)
    {
        return $this->calculator->calculateWidth($text);
    }

    /**
     * Render the badge from the parameters and format given.
     *
     * @param array  $params
     * @param string $format
     *
     * @return string
     */
    protected function renderSvg(array $params, $format)
    {
        $template = file_get_contents($this->path.'/'.$this->getTemplate());

        foreach ($params as $key => $param) {
            $template = str_replace(sprintf('{{ %s }}', $key), $param, $template);
        }

        return BadgeImage::createFromString($template, $format);
    }
}
