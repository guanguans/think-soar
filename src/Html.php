<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\ThinkSoar;

use think\facade\Log;

class Html
{
    /**
     * @var string
     */
    protected $file = __DIR__.'/Tpl/soar.tpl';

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return false|string
     */
    public function getHtmlContent()
    {
        $soars = $this->getSqlInfo();

        ob_start();
        include $this->getFile();

        return ob_get_clean();
    }

    /**
     * @return array
     */
    public function getSqlInfo()
    {
        $sqls = Log::getLog('sql');
        foreach ($sqls as &$sql) {
            preg_match_all('/\[ SQL \]|\[\sRunTime:.*\s\]/', $sql, $arr);
            if (!empty($arr[0])) {
                $sqlStr = preg_replace('/\[ SQL \]|\[\sRunTime:.*\s\]/', '', $sql);
                array_push($arr[0], $sqlStr);
                $sql = $arr[0][2];
            }
        }
        unset($sql);
        $soars = [];
        $soars['Soar'] = isset($sqls) ? $sqls : '';

        return $soars;
    }
}
