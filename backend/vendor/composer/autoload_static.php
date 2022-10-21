<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcdbee8091001d09ce75ec912d7ccbbbd
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Workerman\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Workerman\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/workerman',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcdbee8091001d09ce75ec912d7ccbbbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcdbee8091001d09ce75ec912d7ccbbbd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcdbee8091001d09ce75ec912d7ccbbbd::$classMap;

        }, null, ClassLoader::class);
    }
}