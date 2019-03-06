<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b17fbcd090bec6b9614ec79c92df752
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DrewM\\MailChimp\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DrewM\\MailChimp\\' => 
        array (
            0 => __DIR__ . '/..' . '/drewm/mailchimp-api/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b17fbcd090bec6b9614ec79c92df752::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b17fbcd090bec6b9614ec79c92df752::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
