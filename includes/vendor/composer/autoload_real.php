<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitcdcf6968333265c0e51a3b0e243eb44e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitcdcf6968333265c0e51a3b0e243eb44e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcdcf6968333265c0e51a3b0e243eb44e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcdcf6968333265c0e51a3b0e243eb44e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
