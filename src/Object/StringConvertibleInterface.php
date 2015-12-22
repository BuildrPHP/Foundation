<?php namespace BuildR\Foundation\Object;

/**
 * Common interface for object that can be convertible to string.
 *
 * BuildR PHP Framework
 *
 * @author Zoltán Borsos <zolli07@gmail.com>
 * @package Foundation
 * @subpackage Object
 *
 * @copyright    Copyright 2015, Zoltán Borsos.
 * @license      https://github.com/Zolli/BuildR/blob/master/LICENSE.md
 * @link         https://github.com/Zolli/BuildR
 */
interface StringConvertibleInterface {

    /**
     * Converts the object into a string representation
     *
     * @return string
     */
    public function __toString();

}
