<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit07c8c8e8437dee2075c85db7793b929c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit07c8c8e8437dee2075c85db7793b929c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit07c8c8e8437dee2075c85db7793b929c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit07c8c8e8437dee2075c85db7793b929c::$classMap;

        }, null, ClassLoader::class);
    }
}
