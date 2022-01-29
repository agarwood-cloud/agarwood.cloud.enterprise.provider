<?php declare(strict_types=1);
/**
 * This file is part of Agarwood Cloud.
 *
 * @link     https://www.agarwood-cloud.com
 * @document https://www.agarwood-cloud.com/docs
 * @contact  676786620@qq.com
 * @author   agarwood
 */

use SwoftTest\Testing\TestApplication;

$baseDir = dirname(__DIR__);
$vendor  = dirname(__DIR__) . '/vendor';

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require dirname(__DIR__) . '/vendor/autoload.php';
$loader->addPsr4('SwoftTest\\Testing\\', $vendor . '/swoft/framework/test/testing/');

$application = new TestApplication($baseDir);
$application->setBeanFile($baseDir . '/app/bean.php');
$application->run();
