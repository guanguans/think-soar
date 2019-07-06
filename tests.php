<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

require_once __DIR__.'/vendor/autoload.php';

use Guanguans\SoarPHP\Soar;

// var_dump($config = Config::get('soar.'));

\think\facade\Config::get('soar.');

$soar = new Soar($configgggg);

var_dump($soar);
