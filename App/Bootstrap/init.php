<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../foundation/fileloader.php';

use ConfettiCMS\Foundation\Kernel;

ini_set('zend.exception_string_param_max_len', '200');

error_reporting(E_ALL);
ini_set("display_errors", 1);
$kernel = new Kernel();
/** @noinspection PhpUnhandledExceptionInspection */
$kernel->phpIniSettings();
$kernel->setEnvironmentSettings();
$kernel->run();
