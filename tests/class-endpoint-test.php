<?php
/**
 * This abstraction makes more sense in the context of the full app.
 */
declare(strict_types=1);

namespace IsolationTest\TestHelpers;

use Mockery;
use WP_Mock\Tools as WPMockTools;
use WP_Mock;

class EndpointTestCase extends WPMockTools\TestCase {
    public function setUp() : void
    {
        WP_Mock::setUp();
    }

    public function tearDown() : void
    {
        WP_Mock::tearDown();
    }

    /**
     * Create a mock WP_REST_Request object with the specified parameters.
     *
     * @param array $params Array of query parameters and their values.
     * @return Mockery\MockInterface
     */
    public function createMockRequest(array $params = []) : Mockery\MockInterface
    {
        $request = Mockery::mock('\WP_REST_Request');
        foreach ($params as $param => $value) {
            $request->shouldReceive('get_param')->with($param)->andReturn($value);
        }
        return $request;
    }

    /**
     * Expect rest_ensure_response to be called with a particular payload.
     *
     * @param mixed $response The object to expect to be sent as the REST response.
     * @return void
     */
    public function expectRestResponse($response) : void
    {
        WP_Mock::userFunction('rest_ensure_response')
            ->once()
            ->with($response)
            ->andReturn(Mockery::mock('\WP_REST_Response'));
    }
}
