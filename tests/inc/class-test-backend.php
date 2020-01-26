<?php
namespace IsolationTest\Tests\Backend;

use IsolationTest\Backend;
use WP_Mock;
use WP_Mock\Tools as WPMockTools;

class TestDecoratorsEndpoint extends WPMockTools\TestCase {
    public function setUp() : void
    {
        WP_Mock::setUp();
    }

    public function tearDown() : void
    {
        WP_Mock::tearDown();
    }

    public function test_proxyToBackend() : void
    {
        WP_Mock::userFunction('OtherPlugin\\getTheData')
            ->once()
            ->andReturn([
                'keyed' => 'array',
                'of' => 'data',
            ]);

        $data = Backend\proxyToBackend();
        $this->assertEquals([
            'keyed',
            'array',
            'of',
            'data',
        ], $data);
    }
}
