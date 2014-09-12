<?php

/*
The MIT License (MIT)

Copyright (c) 2014 datibbaw

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

if (!extension_loaded('ereg')) {
    /**
     * Converts a POSIX regular expression into PCRE
     *
     * @param string $pattern
     * @param string $modifiers
     * @return string
     */
    function ereg_to_pcre($pattern, $modifiers = '')
    {
        static $digit = '\d';
        static $upper = 'A-Z';
        static $lower = 'a-z';
        static $punct = '!"#$%&\'()*+,\-.\\/:;<=>?@[\\\\\\]^_`{|}~';
        static $space = '\s';
        static $blank = '\t ';
        static $cntrl = '\x00-\x1f\x7f';

        $pattern = preg_replace_callback('/\\\\(.)/', function($match) {
            return strchr('.^[$()|*+?{\\', $match[1]) !== false ? $match[0] : $match[1];
        }, $pattern);

        return '/' . strtr(addcslashes($pattern, '/'), [
            '[:alnum:]' => $upper . $lower . $digit,
            '[:digit:]' => $digit,
            '[:punct:]' => $punct,

            '[:alpha:]' => $upper . $lower,
            '[:graph:]' => $punct . $upper . $lower . $digit,
            '[:space:]' => $space,

            '[:blank:]' => $blank,
            '[:lower:]' => $lower,
            '[:upper:]' => $upper,

            '[:cntrl:]' => $cntrl,
            '[:print:]' => $punct . $upper . $lower . $digit . ' ',
            '[:xdigit:]' => $digit . 'A-Fa-f',

            '[[:<:]]' => '',
            '[[:>:]]' => '',
        ]) . '/' . $modifiers;
    }

    /**
     * @see http://php.net/ereg
     *
     * @param $pattern
     * @param $string
     * @param array $registers
     * @return bool|int
     */
    function ereg($pattern, $string, &$registers = [])
    {
        trigger_error("Function " . __FUNCTION__ . "() is deprecated", E_USER_DEPRECATED);

        if (!($res = preg_match(ereg_to_pcre($pattern), $string, $matches))) {
            return false;
        }

        $registers = array_map(function($match) {
            return $match === '' ? false : $match;
        }, $matches);

        if (func_num_args() <= 2) {
            return 1;
        }

        return strlen($matches[0]) ?: 1;
    }

    /**
     * @see http://php.net/eregi
     *
     * @param string $pattern
     * @param string $string
     * @param array $registers
     * @return bool|int
     */
    function eregi($pattern, $string, &$registers = [])
    {
        trigger_error("Function " . __FUNCTION__ . "() is deprecated", E_USER_DEPRECATED);

        if (!(preg_match(ereg_to_pcre($pattern, 'i'), $string, $matches))) {
            return false;
        }

        $registers = array_map(function($match) {
            return $match === '' ? false : $match;
        }, $matches);

        if (func_num_args() <= 2) {
            return 1;
        }

        return strlen($matches[0]) ?: 1;
    }

    /**
     * @see http://php.net/ereg_replace
     *
     * @param string $pattern
     * @param string $replacement
     * @param string $string
     * @return string|false
     */
    function ereg_replace($pattern, $replacement, $string)
    {
        trigger_error("Function " . __FUNCTION__ . "() is deprecated", E_USER_DEPRECATED);

		$pattern = ereg_to_pcre($pattern);
		$replacement = strtr($replacement, ['\\\\' => '\\\\\\\\']);

        if (($res = preg_replace($pattern, $replacement, $string)) === null) {
            return false;
        }

        return $res;
    }

    /**
     * @see http://php.net/eregi_replace
     *
     * @param string $pattern
     * @param string $replacement
     * @param string $string
     * @return string|false
     */
    function eregi_replace($pattern, $replacement, $string)
    {
        trigger_error("Function " . __FUNCTION__ . "() is deprecated", E_USER_DEPRECATED);

		$pattern = ereg_to_pcre($pattern, 'i');
		$replacement = strtr($replacement, ['\\\\' => '\\\\\\\\']);

        if (($res = preg_replace($pattern, $replacement, $string)) === null) {
            return false;
        }

        return $res;
    }

    /**
     * @see http://php.net/split
     *
     * @param string $pattern
     * @param string $string
     * @param int $limit
     * @return array
     */
    function split($pattern, $string, $limit = -1)
    {
        trigger_error("Function " . __FUNCTION__ . "() is deprecated", E_USER_DEPRECATED);

        if ($limit == 0) {
            return array($string);
        }

        return preg_split(ereg_to_pcre($pattern), $string, $limit);
    }

    /**
     * @see http://php.net/spliti
     *
     * @param string $pattern
     * @param string $string
     * @param int $limit
     * @return array
     */
    function spliti($pattern, $string, $limit = -1)
    {
        trigger_error("Function " . __FUNCTION__ . "() is deprecated", E_USER_DEPRECATED);

        if ($limit == 0) {
            return array($string);
        }

        return preg_split(ereg_to_pcre($pattern, 'i'), $string, $limit);
    }

    /**
     * @see http://php.net/sql_regcase
     *
     * @param string $string
     * @return string
     */
    function sql_regcase($string)
    {
        trigger_error("Function " . __FUNCTION__ . "() is deprecated", E_USER_DEPRECATED);

        $out = ''; $n = strlen($string);

        for ($i = 0; $i < $n; ++$i) {
            $ch = $string[$i];
            if ($ch >= 'A' && $ch <= 'Z') {
                $out .= '[' . $ch . strtolower($ch) . ']';
            } elseif ($ch >= 'a' && $ch <= 'z') {
                $out .= '[' . strtoupper($ch) . $ch . ']';
            } else {
                $out .= $ch;
            }
        }

        return $out;
    }
}
