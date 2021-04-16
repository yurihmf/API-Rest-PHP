<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf037df4289c17155c633d3ff5e3e1b6b
{
    public static $files = array (
        '0d8462dfbe8470cc1659840fd6f398fc' => __DIR__ . '/../..' . '/app/Connection/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf037df4289c17155c633d3ff5e3e1b6b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf037df4289c17155c633d3ff5e3e1b6b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf037df4289c17155c633d3ff5e3e1b6b::$classMap;

        }, null, ClassLoader::class);
    }
}
