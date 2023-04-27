<?php return array(
    'root' => array(
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => 'd9b2b06ee2fc803f6cc7c168f8004bc5954761f1',
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
            'reference' => 'd9b2b06ee2fc803f6cc7c168f8004bc5954761f1',
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
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'dev_requirement' => false,
        ),
        'fumikito/wp-readme' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'type' => 'library',
            'install_path' => __DIR__ . '/../fumikito/wp-readme',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'reference' => '686b2027e8a612444fdc275ae59aa659b198ff93',
            'dev_requirement' => true,
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
