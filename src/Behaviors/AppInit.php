<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\ThinkSoar\Behaviors;

use Guanguans\ThinkSoar\Html;
use Guanguans\ThinkSoar\Soar;

class AppInit
{
    public function run()
    {
        bind('soar', Soar::class);
        bind('html', Html::class);
    }
}
