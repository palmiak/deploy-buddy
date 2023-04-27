<?php return array(
    'root' => array(
        'name' => 'buddy/deploy-buddy',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '0fb7e653de3d35c86afa42318ca8fed516450317',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'buddy/deploy-buddy' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '0fb7e653de3d35c86afa42318ca8fed516450317',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'cmb2/cmb2' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '7bce941075f24fe4d991434014c4b860fec62f3d',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../cmb2',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'fumikito/wp-readme' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '686b2027e8a612444fdc275ae59aa659b198ff93',
            'type' => 'library',
            'install_path' => __DIR__ . '/../fumikito/wp-readme',
            'aliases' => array(
                0 => '9999999-dev',
            ),
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
