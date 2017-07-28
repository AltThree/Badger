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

namespace AltThree\Tests\Badger\Calculator;

use AltThree\Badger\Calculator\GDTextSizeCalculator;
use GrahamCampbell\TestBench\AbstractTestCase;

/**
 * This is the gd text size calculator test case class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class GDTextSizeCalculatorTest extends AbstractTestCase
{
    public function testCalculateWidth()
    {
        $calculator = new GDTextSizeCalculator(realpath(__DIR__.'/../../resources/fonts/DejaVuSans.ttf'));

        $this->assertSame(60.0, $calculator->calculateWidth('Alt Three'));
    }
}
