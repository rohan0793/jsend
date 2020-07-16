<?php

namespace RC\Jsend\Tests;

use Orchestra\Testbench\TestCase;
use RC\Jsend\ResponseMacroServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [ResponseMacroServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
