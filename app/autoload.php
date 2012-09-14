<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

if (!class_exists('Composer\\Autoload\\ClassLoader', false)) {
    $loader = require __DIR__.'/../vendor/autoload.php';
} else {
    $loader = new Composer\Autoload\ClassLoader();
    $loader->register();
}

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';

    $loader->add('', __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs');
}

AnnotationRegistry::registerLoader('class_exists');

return $loader;
