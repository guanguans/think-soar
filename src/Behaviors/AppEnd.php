<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\ThinkSoar\Behaviors;

class AppEnd
{
    public function run()
    {
        if (
            (true !== \request()->isAjax() || false === strpos(\request()->header('accept'), 'application/json'))
            && is_string($content = app('html')->getHtmlContent())
        ) {
            echo $content;
        }
    }
}
