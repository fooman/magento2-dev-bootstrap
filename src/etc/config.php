<?php

use \Magento\Framework\Component\ComponentRegistrar;

$componentRegistrar = new ComponentRegistrar();
$result = [];
foreach ($componentRegistrar->getPaths(ComponentRegistrar::MODULE) as $mod => $path) {
    $result[$mod] = 1;
}

return [
    'modules' => $result
];