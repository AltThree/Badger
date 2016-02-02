<?php

/*
 * This file is part of Alt Three Badger.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\Tests\Badger\Render;

use AltThree\Badger\Badge;
use AltThree\Badger\Calculator\GDTextSizeCalculator;
use AltThree\Badger\Render\SocialRender;
use AltThree\Tests\Badger\AbstractTestCase;

/**
 * This is the social render test case class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class SocialRenderTest extends AbstractTestCase
{
    public function testGetSupportedFormats()
    {
        $svgRender = $this->getSocialRenderer();

        $this->assertSame(['social'], $svgRender->getSupportedFormats());
    }

    public function testRenderAltThreeAwesomeBrightGreen()
    {
        $svgRender = $this->getSocialRenderer();
        $badge = new Badge('Alt Three', 'Awesome', 'yellowgreen', 'svg');
        $badgeImage = $svgRender->render($badge);

        $this->assertSame($this->getStubFile('alt-three-yellowgreen-social.svg'), (string) $badgeImage);
        $this->assertSame('svg', $badgeImage->getFormat());
    }

    protected function getSocialRenderer()
    {
        $textSizeCalculator = new GDTextSizeCalculator();

        return new SocialRender($textSizeCalculator);
    }

    protected function getStubFile($file)
    {
        $path = realpath(__DIR__.'/stubs');

        return file_get_contents($path.'/'.$file);
    }
}
