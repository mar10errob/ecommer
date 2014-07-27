<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';
/*
$loader->registerNamespaces(array(
	'Knp\\Component' => __DIR__.'/../vendor/knplabs/knp-components/src',
	'Knp\\Bundle' => __DIR__.'/../vendor/knplabs/knp-paginator-bundle'
	));
	*/

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
