<?php
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

// Now call the bootstrap method of WP Mock
WP_Mock::bootstrap();

// Load the base class for endpoint tests.
require_once __DIR__ . '/class-endpoint-test.php';

// Load in API endpoints.
require_once dirname( __DIR__ ) . '/inc/endpoints/data.php';

// If we require this file, the class-test-data-endpoint tests break.
// If we don't, the class-test-backend.php tests break.
require_once dirname( __DIR__ ) . '/inc/backend.php';
