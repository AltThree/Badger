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
 * This is the social render class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class SocialRender extends AbstractRender
{
    /**
     * Return a list of supported formats by the render.
     *
     * @return string[]
     */
    public function getSupportedFormats()
    {
        return ['social'];
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
            'totalWidth'          => ($subjectWidth + $statusWidth) + 7,
            'vendorColor'         => $this->vendorColor,
            'valueColor'          => $badge->getHexColor(),
            'vendor'              => $badge->getSubject(),
            'value'               => $badge->getStatus(),
            'vendorStartPosition' => round($subjectWidth / 2, 1) + 1,
            'valueStartPosition'  => $subjectWidth + $statusWidth / 2 + 6,
            'arrowStartPosition'  => $subjectWidth + 6,
            'arrowPathPosition'   => $subjectWidth + 6.5,
        ];

        return $this->renderSvg($params, $badge->getFormat());
    }

    /**
     * Returns the template contents.
     *
     * @return string
     */
    protected function getTemplate()
    {
        return 'social.svg';
    }
}
