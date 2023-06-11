<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcdcf6968333265c0e51a3b0e243eb44e
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitcdcf6968333265c0e51a3b0e243eb44e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcdcf6968333265c0e51a3b0e243eb44e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcdcf6968333265c0e51a3b0e243eb44e::$classMap;

        }, null, ClassLoader::class);
    }
}
