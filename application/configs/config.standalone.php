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
        )
    )
);
