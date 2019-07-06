<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use Guanguans\ThinkSoar\Facade;
use Guanguans\ThinkSoar\Soar;
use think\Db;
use think\facade\Config;

if (!function_exists('soar')) {
    /**
     * @return \Guanguans\ThinkSoar\Soar
     */
    function soar()
    {
        return Facade::make(Soar::class, [Config::get('soar.')]);
    }
}

if (!function_exists('soar_score')) {
    /**
     * @param null $sql
     *
     * @return string|null
     *
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidArgumentException
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
     * @return string|null
     *
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidArgumentException
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidConfigException
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
     * @return string|null
     *
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidArgumentException
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidConfigException
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
     * @return string|null
     *
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidArgumentException
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
     * @return string|null
     *
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidArgumentException
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
     * @return string|null
     *
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidArgumentException
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
     * @return string|null
     *
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidArgumentException
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
     * @return string|null
     *
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidArgumentException
     */
    function soar_exec($command)
    {
        return soar()->exec($command);
    }
}

if (!function_exists('soar_help')) {
    /**
     * @return string|null
     *
     * @throws \Guanguans\SoarPHP\Exceptions\InvalidArgumentException
     */
    function soar_help()
    {
        return soar()->help();
    }
}
