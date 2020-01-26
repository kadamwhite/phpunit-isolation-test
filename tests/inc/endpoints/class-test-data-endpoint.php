<?php namespace IsolationTest\Tests\Endpoints\Data;

use IsolationTest\TestHelpers;
use IsolationTest\Endpoints\Data;
use Mockery;
use WP_Mock;
use WP_Mock\Tools as WPMockTools;
use WP_REST_Request;

class TestDecoratorsEndpoint extends TestHelpers\EndpointTestCase {

    public function test_getItems() : void
    {
        $request = $this->createMockRequest();

        WP_Mock::userFunction('IsolationTest\\Backend\\proxyToBackend')
            ->once()
            ->andReturn([
                'flat',
                'array',
                'of',
                'values',
            ]);

        $this->expectRestResponse([
            'flat',
            'array',
            'of',
            'values',
        ]);

        $response = Data\getItems($this->createMockRequest());
        $this->assertConditionsMet();
    }
}
