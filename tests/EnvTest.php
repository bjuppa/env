<?php

namespace Fewagency\Env;

class EnvTest extends \PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $lines = Env::init(__DIR__ . '/../');

        $this->assertContains('EXAMPLE=test', $lines);
    }
}
