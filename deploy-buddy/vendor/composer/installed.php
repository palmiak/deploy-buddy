<?php return array(
    'root' => array(
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => 'e65adfb2e1aa04065d46632ec5e994296b88111a',
        'name' => 'buddy/deploy-buddy',
        'dev' => true,
    ),
    'versions' => array(
        'buddy/deploy-buddy' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => 'e65adfb2e1aa04065d46632ec5e994296b88111a',
            'dev_requirement' => false,
        ),
        'cmb2/cmb2' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../cmb2',
            'aliases' => array(),
            'reference' => 'cacbc8cedbfdf8ffe0e840858e6860f9333c33f2',
            'dev_requirement' => false,
        ),
        'composer/installers' => array(
            'pretty_version' => 'v1.11.0',
            'version' => '1.11.0.0',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'reference' => 'ae03311f45dfe194412081526be2e003960df74b',
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
    ),
);
