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
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
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
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    public function getSqlInfo()
    {
        $soar = soar();
        $sqls = Log::getLog('sql');
        $soars = [];
        foreach ($sqls as $k => $sql) {
            preg_match_all('/\[ SQL \]|\[\sRunTime:.*\s\]/', $sql, $arr);
            if (!empty($arr[0])) {
                $sqlStr = preg_replace('/\[ SQL \]|\[\sRunTime:.*\s\]/', '', $sql);
                $soars[$k]['sql'] = $sqlStr;
                $soars[$k]['run_time'] = $arr[0][1];
                $soars[$k]['score'] = $soar->score($sqlStr);
                preg_match_all('/<p>.*分<\/p>/u', $soar->score($sqlStr), $stars);
                $soars[$k]['star'] = rtrim(ltrim($stars[0][0], '<p>'), '</p>');
                try {
                    $soars[$k]['htmlExplain'] = $soar->htmlExplain($sqlStr);
                } catch (\Exception $e) {
                    if (!function_exists('trace')) {
                        trace("EXPLAIN $sqlStr error: ".$e->getMessage());
                    }
                }
            }
        }

        return $soars;
    }
}
