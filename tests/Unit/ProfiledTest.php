<?php

use PHPUnit\Framework\TestCase;

class ProfiledTest extends TestCase
{
    protected function runTest(): void
    {
        $start = microtime(true);

        parent::runTest();

        $end = microtime(true);
        $executionTime = $end - $start;

        echo 'Execution Time for ' . $this->getName() . ': ' . $executionTime . ' seconds' . PHP_EOL;
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testAnotherExample()
    {
        sleep(1);
        $this->assertTrue(true);
    }
}
