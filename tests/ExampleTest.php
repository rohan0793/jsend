<?php

namespace Rohan0793\Jsend\Tests;

use Orchestra\Testbench\TestCase;
use Rohan0793\Jsend\JsendServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [JsendServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
