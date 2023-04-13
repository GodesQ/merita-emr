<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Auth\PatientAuthController;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $controller = new PatientAuthController;
        $result = $controller->login();
        $response = $this->assertTrue(true);
    }
}
