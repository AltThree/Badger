<?php

declare(strict_types=1);

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
use GrahamCampbell\TestBench\AbstractTestCase;

/**
 * This is the social render test case class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
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
        $base = __DIR__.'/../../resources/';

        $calculator = new GDTextSizeCalculator(realpath($base.'fonts/DejaVuSans.ttf'));
        $path = $base.'templates';

        return new SocialRender($calculator, realpath($path));
    }

    protected function getStubFile($file)
    {
        $path = realpath(__DIR__.'/stubs');

        return file_get_contents($path.'/'.$file);
    }
}
