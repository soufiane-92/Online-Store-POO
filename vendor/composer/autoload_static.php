<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit341520da95fef28cc007d53444dce1c8
{
    public static $fallbackDirsPsr0 = array (
        0 => __DIR__ . '/../..' . '/controllers',
        1 => __DIR__ . '/../..' . '/models',
        2 => __DIR__ . '/../..' . '/views',
        3 => __DIR__ . '/../..' . '/',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr0 = ComposerStaticInit341520da95fef28cc007d53444dce1c8::$fallbackDirsPsr0;

        }, null, ClassLoader::class);
    }
}
