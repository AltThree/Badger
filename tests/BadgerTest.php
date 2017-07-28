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

namespace AltThree\Tests\Badger;

use AltThree\Badger\Badger;

class BadgerTest extends AbstractTestCase
{
    public function testGeneratePlastic()
    {
        $badge = $this->getBadger()->generate('license', 'MIT', 'blue', 'plastic');

        $this->assertSame($this->getStubFile('license-MIT-blue-plastic.svg'), (string) $badge);
    }

    public function testGenerateCustomColor()
    {
        $badge = $this->getBadger()->generate('license', 'MIT', 'ff69b4', 'plastic');

        $this->assertSame($this->getStubFile('license-MIT-custom-plastic.svg'), (string) $badge);
    }

    public function testGenerateFromString()
    {
        $badge = $this->getBadger()->generateFromString('license-MIT-red.svg');

        $this->assertSame($this->getStubFile('license-MIT-string.svg'), (string) $badge);
    }

    protected function getBadger()
    {
        return $this->app->badger;
    }

    protected function getStubFile($file)
    {
        $path = realpath(__DIR__.'/stubs');

        return file_get_contents($path.'/'.$file);
    }
}
