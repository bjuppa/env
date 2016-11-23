<?php

namespace Fewagency\Env;

class EnvTest extends \PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $this->assertFileExists(__DIR__ . '/../.env');

        $lines = Env::init(__DIR__ . '/../');

        $this->assertContains('EXAMPLE=test', $lines);
    }

    public function testEnvEnv()
    {
        $this->assertEquals('test', Env::env('EXAMPLE'));
    }

    public function testEnvFunction()
    {
        $this->assertEquals('test', env('EXAMPLE'));
    }
}
