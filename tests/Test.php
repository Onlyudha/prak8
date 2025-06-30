<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testHello()
    {
        $this->assertEquals("Hello from PHP App!", trim(shell_exec("php index.php")));
    }
}
