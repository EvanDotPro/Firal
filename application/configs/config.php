<?php
return array_merge_recursive(
    array(
        'autoloaderNamespaces' => array(
            'Firal_'
        )
    ),
    include dirname(__FILE__) . '/config.' . APPLICATION_MODE . '.php',
    include dirname(__FILE__) . '/config.' . APPLICATION_MODE . '.' . APPLICATION_ENV . '.php'
);
