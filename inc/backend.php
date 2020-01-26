<?php

namespace IsolationTest\Backend;

use OtherPlugin;

function proxyToBackend() : array
{
    $values = [];
    $data = OtherPlugin\getTheData();

    foreach ($data as $key => $value) {
        $values[] = $key;
        $values[] = $value;
    }

    return $values;
}
