<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5a28ac411a3fd794e49a14204e830142
{
    public static $files = array (
        '25037a01d36a2d70ba3dce50eeffa7bf' => __DIR__ . '/../..' . '/src/init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'GutenGeek\\Components\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'GutenGeek\\Components\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5a28ac411a3fd794e49a14204e830142::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5a28ac411a3fd794e49a14204e830142::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}