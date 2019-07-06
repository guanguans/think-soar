<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

return [
    // soar 路径
    '-soar-path'   => 'path/to/soar',
    // 线上环境配置
    '-online-dsn'  => [
        'host'     => '127.0.0.1',
        'port'     => '3306',
        'dbname'   => 'database',
        'username' => 'selectuser',
        'password' => '123456',
        'disable'  => false,
    ],
    // 测试环境配置
    '-test-dsn'    => [
        'host'     => '127.0.0.1',
        'port'     => '3306',
        'dbname'   => 'database',
        'username' => 'root',
        'password' => '123456',
        'disable'  => false,
    ],
    // 日志输出文件
    '-log-output'  => './soar.log',
    // 日志级别: [0=>Emergency, 1=>Alert, 2=>Critical, 3=>Error, 4=>Warning, 5=>Notice, 6=>Informational, 7=>Debug]
    '-log-level'   => 7,
    // 报告输出格式: [markdown, html, json]
    '-report-type' => 'html'
];
