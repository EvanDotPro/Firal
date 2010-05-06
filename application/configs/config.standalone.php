<?php
return array(
    'bootstrap' => array(
        'path'  => APPLICATION_PATH . '/StandaloneBootstrap.php',
        'class' => 'StandaloneBootstrap'
    ),
    'resources' => array(
        'frontController' => array(
            'moduleDirectory'     => APPLICATION_PATH . '/modules',
            'prefixDefaultModule' => true
        ),
        'cachemanager' => array(
            'database' => array(
                'frontend' => array(
                    'name' => 'Core',
                    'options' => array(
                        'automatic_serialization' => true
                    )
                ),
                'backend' => array()
            )
        )
    )
);
