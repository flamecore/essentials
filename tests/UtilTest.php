<?php
/**
 * FlameCore Essentials
 * Copyright (C) 2015 IceFlame.net
 *
 * Permission to use, copy, modify, and/or distribute this software for
 * any purpose with or without fee is hereby granted, provided that the
 * above copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE
 * FOR ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY
 * DAMAGES WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER
 * IN AN ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING
 * OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 *
 * @package  FlameCore\Essentials
 * @version  0.1-dev
 * @link     http://www.flamecore.org
 * @license  ISC License <http://opensource.org/licenses/ISC>
 */

namespace FlameCore\Essentials\Tests;

use FlameCore\Essentials\Util;

/**
 * Test class for Util
 *
 * @author   Christian Neff <christian.neff@gmail.com>
 */
class UtilTest extends \PHPUnit_Framework_TestCase
{
    public function testMakeSlug()
    {
        $this->assertEquals('foo-bar-baz-foo--aeoeue', Util::makeSlug('foo_bar, baz-foo;  äöü'));
        $this->assertEquals('foo_bar_baz_foo', Util::makeSlug('foo-bar baz foo', '_'));
        $this->assertEquals('foo_bar_baz', Util::makeSlug('foo-bar baz äöü', '_', false));
    }

    public function testListTags()
    {
        $this->assertEquals('abc, def, ghi', Util::listTags(['ghi', 'def', 'abc']));
        $this->assertEquals('abc; def; ghi', Util::listTags(['ghi', 'def', 'abc'], '; '));
        $this->assertEquals('<a href="/foo">abc</a>, <a href="/foo">def</a>', Util::listTags(['abc', 'def'], ', ', '/foo'));
        $this->assertEquals('<a href="/abc">abc</a>; <a href="/def">def</a>', Util::listTags(['abc', 'def'], '; ', '/%s'));
    }
}
