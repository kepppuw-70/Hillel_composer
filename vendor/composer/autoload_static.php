<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45b3a29c758b66a45a8d95848040c95e
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'liw\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'liw\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45b3a29c758b66a45a8d95848040c95e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45b3a29c758b66a45a8d95848040c95e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}