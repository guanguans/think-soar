<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use Guanguans\ThinkSoar\Behaviors\AppEnd;
use Guanguans\ThinkSoar\Behaviors\AppInit;
use Guanguans\ThinkSoar\Exceptions\InvalidConfigException;
use Guanguans\ThinkSoar\Facade;
use Guanguans\ThinkSoar\Soar;
use think\Db;
use think\facade\Config;

if (function_exists('app')) {
    \app('hook')->add('app_init', AppInit::class);
    if (Config::get('app.app_debug') && Config::get('app.app_trace')) {
        $hook = \app('hook')->add('app_end', AppEnd::class);
    }
}

if (!function_exists('soar')) {
    /**
     * @return object
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    function soar()
    {
        if (!Config::get('app.app_debug') || !Config::get('app.app_trace')) {
            throw new InvalidConfigException(sprintf('Config must be true :[%s/%s]', 'app_debug', 'app_trace'));
        }

        return Facade::make(Soar::class, [Config::get('soar.')]);
    }
}

if (!function_exists('soar_score')) {
    /**
     * @param null $sql
     *
     * @return mixed
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    function soar_score($sql = null)
    {
        return null === $sql ? soar()->score(Db::getLastSql()) : soar()->score($sql);
    }
}

if (!function_exists('soar_md_explain')) {
    /**
     * @param null $sql
     *
     * @return mixed
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    function soar_md_explain($sql = null)
    {
        return null === $sql ? soar()->mdExplain(Db::getLastSql()) : soar()->mdExplain($sql);
    }
}

if (!function_exists('soar_html_explain')) {
    /**
     * @param null $sql
     *
     * @return mixed
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException\
     */
    function soar_html_explain($sql = null)
    {
        return null === $sql ? soar()->htmlExplain(Db::getLastSql()) : soar()->htmlExplain($sql);
    }
}

if (!function_exists('soar_syntax_check')) {
    /**
     * @param null $sql
     *
     * @return mixed
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    function soar_syntax_check($sql = null)
    {
        return null === $sql ? soar()->syntaxCheck(Db::getLastSql()) : soar()->syntaxCheck($sql);
    }
}

if (!function_exists('soar_finger_print')) {
    /**
     * @param null $sql
     *
     * @return mixed
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    function soar_finger_print($sql = null)
    {
        return null === $sql ? soar()->fingerPrint(Db::getLastSql()) : soar()->fingerPrint($sql);
    }
}

if (!function_exists('soar_pretty')) {
    /**
     * @param null $sql
     *
     * @return mixed
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    function soar_pretty($sql = null)
    {
        return null === $sql ? soar()->pretty(Db::getLastSql()) : soar()->pretty($sql);
    }
}

if (!function_exists('soar_md2html')) {
    /**
     * @param $markdown
     *
     * @return mixed
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    function soar_md2html($markdown)
    {
        return  soar()->md2html($markdown);
    }
}

if (!function_exists('soar_exec')) {
    /**
     * @param $command
     *
     * @return mixed
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    function soar_exec($command)
    {
        return soar()->exec($command);
    }
}

if (!function_exists('soar_help')) {
    /**
     * @return mixed
     *
     * @throws \Guanguans\ThinkSoar\Exceptions\InvalidConfigException
     */
    function soar_help()
    {
        return soar()->help();
    }
}
