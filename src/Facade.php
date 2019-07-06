<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\ThinkSoar;

use think\Facade as ThinkFacade;

class Facade extends ThinkFacade
{
    protected static function getFacadeClass()
    {
        return 'Facade';
    }
}
