<?php

/*
 * This file is part of Alt Three Badger.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\Tests\Badger\Calculator;

use AltThree\Badge\Calculator\TextSizeCalculatorInterface;
use AltThree\Badger\Calculator\GDTextSizeCalculator;
use AltThree\Tests\Badger\AbstractTestCase;

/**
 * This is the gd text size calculator test case class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class GDTextSizeCalculatorTest extends AbstractTestCase
{
    public function testCalculateWidth()
    {
        $textSizeCalculator = new GDTextSizeCalculator();
        $this->assertEquals(60, $textSizeCalculator->calculateWidth('Alt Three'));
    }
}
