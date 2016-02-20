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
use AltThree\Badger\Render\PlasticFlatRender;
use GrahamCampbell\TestBench\AbstractTestCase;

/**
 * This is the plastic flat render test case class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class PlasticFlatRenderTest extends AbstractTestCase
{
    public function testGetSupportedFormats()
    {
        $svgRender = $this->getPlasticFlatRenderer();

        $this->assertSame(['plastic-flat', 'flat'], $svgRender->getSupportedFormats());
    }

    public function testRenderAltThreeAwesomeBrightGreen()
    {
        $svgRender = $this->getPlasticFlatRenderer();
        $badge = new Badge('Alt Three', 'Awesome', 'brightgreen', 'svg');
        $badgeImage = $svgRender->render($badge);

        $this->assertSame($this->getStubFile('alt-three-awesome-brightgreen-plastic-flat.svg'), (string) $badgeImage);
        $this->assertSame('svg', $badgeImage->getFormat());
    }

    public function testRenderAltThreeDeadRed()
    {
        $svgRender = $this->getPlasticFlatRenderer();
        $badge = new Badge('Alt Three', 'Dead', 'red', 'svg');
        $badgeImage = $svgRender->render($badge);

        $this->assertSame($this->getStubFile('alt-three-dead-red-plastic-flat.svg'), (string) $badgeImage);
        $this->assertSame('svg', $badgeImage->getFormat());
    }

    protected function getPlasticFlatRenderer()
    {
        $base = __DIR__.'/../../resources/';

        $calculator = new GDTextSizeCalculator(realpath($base.'fonts/DejaVuSans.ttf'));
        $path = $base.'templates';

        return new PlasticFlatRender($calculator, realpath($path));
    }

    protected function getStubFile($file)
    {
        $path = realpath(__DIR__.'/stubs');

        return file_get_contents($path.'/'.$file);
    }
}
