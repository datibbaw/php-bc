php-bc
======

Deprecated extensions implemented in PHP.

[![Build Status](https://travis-ci.org/datibbaw/php-bc.svg?branch=master)](https://travis-ci.org/datibbaw/php-bc)

ereg
----

This is a drop-in replacement for the [`ereg`](http://php.net/manual/en/book.regex.php) extension which may be removed as a core extension in the next major version of php.

Besides implementing all the functions of the original extension, it provides one extra helper function to convert regular expressions into PCRE:

<code php>
string ereg_to_pcre(string $pattern [, $modifiers = ''])
</code>

Known issues:
  - No support for collating sequences
  - No support for equivalence classes
  - May not work for expressions that match regular expressions
