<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2379792f69f8c90eccb6b311a532b593
{
    public static $files = array (
        '1c75bfdc9edfee2e785890f34b52ca38' => __DIR__ . '/../..' . '/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
        'B' => 
        array (
            'BuddyIntegration\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'BuddyIntegration\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2379792f69f8c90eccb6b311a532b593::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2379792f69f8c90eccb6b311a532b593::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2379792f69f8c90eccb6b311a532b593::$classMap;

        }, null, ClassLoader::class);
    }
}