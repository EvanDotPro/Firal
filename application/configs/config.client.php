<?php
return array(
    'bootstrap' => array(
        'path'  => APPLICATION_PATH . '/ClientBootstrap.php',
        'class' => 'ClientBootstrap'
    ),
    'resources' => array(
        'frontController' => array(
            'moduleDirectory' => APPLICATION_PATH . '/modules'
        )
    )
);