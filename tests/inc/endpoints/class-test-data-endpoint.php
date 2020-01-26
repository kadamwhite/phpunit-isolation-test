<?php namespace IsolationTest\Tests\Endpoints\Data;

use IsolationTest\TestHelpers;
use IsolationTest\Endpoints\Data;
use WP_Mock;

class TestDataEndpoint extends TestHelpers\EndpointTestCase {
    public function test_getItems() : void
    {
        $request = $this->createMockRequest();

        // This mock does not work if the actual Backend namespace is loaded.
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
