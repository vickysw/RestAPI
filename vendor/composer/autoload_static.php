<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb2e03895e778e7baac59d1e48630a0c5
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'App\\Core\\Controller' => __DIR__ . '/../..' . '/src/Core/Controller.php',
        'App\\Core\\Databse\\Mysql' => __DIR__ . '/../..' . '/src/Core/Database/Mysql.php',
        'App\\Core\\Loader' => __DIR__ . '/../..' . '/src/Core/Loader.php',
        'App\\Core\\Main' => __DIR__ . '/../..' . '/src/Core/Main.php',
        'App\\Core\\Model' => __DIR__ . '/../..' . '/src/Core/Model.php',
        'App\\Models\\UserModel' => __DIR__ . '/../..' . '/src/Models/UserModel.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb2e03895e778e7baac59d1e48630a0c5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb2e03895e778e7baac59d1e48630a0c5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb2e03895e778e7baac59d1e48630a0c5::$classMap;

        }, null, ClassLoader::class);
    }
}
