<?php

/*
 * This file is part of the guanguans/think-soar.
 *
 * (c) 琯琯 <yzmguanguan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Tests;

class ToDoTest extends TestCase
{
    public function testToDo()
    {
        $this->assertStringStartsWith('to', 'to do tests');
        $this->markTestIncomplete('to do tests');
    }
}
