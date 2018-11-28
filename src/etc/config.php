<?php

use \Magento\Framework\Component\ComponentRegistrar;

$componentRegistrar = new ComponentRegistrar();
$result = [];
foreach ($componentRegistrar->getPaths(ComponentRegistrar::MODULE) as $mod => $path) {
    $result[$mod] = 1;
}

return [
    'modules' => $result,
    'scopes' =>
        array (
            'websites' =>
                array (
                    'base' =>
                        array (
                            'website_id' => '1',
                            'code' => 'base',
                            'name' => 'Main Website',
                            'sort_order' => '0',
                            'default_group_id' => '1',
                            'is_default' => '1',
                        ),
                ),
            'groups' =>
                array (
                    1 =>
                        array (
                            'group_id' => '1',
                            'website_id' => '1',
                            'code' => 'main_website_store',
                            'name' => 'Main Website Store',
                            'root_category_id' => '1',
                            'default_store_id' => '1',
                        ),
                ),
            'stores' =>
                array (
                    'default' =>
                        array (
                            'store_id' => '1',
                            'code' => 'default',
                            'website_id' => '1',
                            'group_id' => '1',
                            'name' => 'Default Store View',
                            'sort_order' => '0',
                            'is_active' => '1',
                        ),
                ),
        ),
];