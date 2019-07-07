<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\ThinkSoar\Behaviors;

use think\facade\Request;

class AppEnd
{
    public function run()
    {
        if (0 === strpos(Request::header('accept'), 'application/json') || Request::isAjax()) {
            exit;
        }

        $content = app('html')->getHtmlContent();
        if (is_string($content)) {
            echo $content;
        }
    }
}
