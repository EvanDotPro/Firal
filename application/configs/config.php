<?php
return array_merge_recursive(
    array(
        'autoloaderNamespaces' => array(
            'Firal_'
        ),
        'resources' => array(
            'addon' => array(
                'directory' => APPLICATION_PATH . '/addons'
            )
        )
    ),
    include dirname(__FILE__) . '/config.' . APPLICATION_MODE . '.php',
    include dirname(__FILE__) . '/config.' . APPLICATION_MODE . '.' . APPLICATION_ENV . '.php'
);
