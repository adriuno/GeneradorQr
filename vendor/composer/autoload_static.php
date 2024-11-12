<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite9dd8cd160a401294a237bfc21231dae
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'DASPRiD\\Enum\\' => 13,
        ),
        'B' => 
        array (
            'BaconQrCode\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'DASPRiD\\Enum\\' => 
        array (
            0 => __DIR__ . '/..' . '/dasprid/enum/src',
        ),
        'BaconQrCode\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
            1 => __DIR__ . '/..' . '/bacon/bacon-qr-code/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite9dd8cd160a401294a237bfc21231dae::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite9dd8cd160a401294a237bfc21231dae::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite9dd8cd160a401294a237bfc21231dae::$classMap;

        }, null, ClassLoader::class);
    }
}
