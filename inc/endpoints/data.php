<?php

namespace IsolationTest\Endpoints\Data;

use IsolationTest\Backend;
use WP_REST_Request;
use WP_REST_Response;

function getItems(WP_REST_Request $request) : WP_REST_Response
{
    $data = Backend\proxyToBackend();

    return rest_ensure_response($data);
}
