--TEST--
Test split() function : basic functionality - test a number of simple split, without specifying a limit
--FILE--
<?php
/* Prototype  : proto array split(string pattern, string string [, int limit])
 * Description: Split string into array by regular expression 
 * Source code: ext/standard/reg.c
 * Alias to functions: 
 */

/*
 * Test a number of simple split, without specifying a limit
 */

echo "*** Testing ereg() : basic functionality ***\n";

include(dirname(__FILE__) . '/regular_expressions.inc');

foreach ($expressions as $re) {
	list($pattern,$string) = $re;
	echo "\n--> Pattern: '$pattern'; match: '$string'\n";
	var_dump(split($pattern, $string . ' |1| ' . $string . ' |2| ' . $string));
}

echo "Done";
?>
--EXPECTF--
*** Testing ereg() : basic functionality ***

--> Pattern: '..(a|b|c)(a|b|c)..'; match: '--- ab ---'

Deprecated: Function split() is deprecated in %s on line %d
array(4) {
  [0]=>
  string(2) "--"
  [1]=>
  string(9) "-- |1| --"
  [2]=>
  string(9) "-- |2| --"
  [3]=>
  string(2) "--"
}

--> Pattern: '()'; match: ''

Deprecated: Function split() is deprecated in %s on line %d
array(12) {
  [0]=>
  string(0) ""
  [1]=>
  string(1) " "
  [2]=>
  string(1) "|"
  [3]=>
  string(1) "1"
  [4]=>
  string(1) "|"
  [5]=>
  string(1) " "
  [6]=>
  string(1) " "
  [7]=>
  string(1) "|"
  [8]=>
  string(1) "2"
  [9]=>
  string(1) "|"
  [10]=>
  string(1) " "
  [11]=>
  string(0) ""
}

--> Pattern: '()'; match: 'abcdef'

Deprecated: Function split() is deprecated in %s on line %d
array(30) {
  [0]=>
  string(0) ""
  [1]=>
  string(1) "a"
  [2]=>
  string(1) "b"
  [3]=>
  string(1) "c"
  [4]=>
  string(1) "d"
  [5]=>
  string(1) "e"
  [6]=>
  string(1) "f"
  [7]=>
  string(1) " "
  [8]=>
  string(1) "|"
  [9]=>
  string(1) "1"
  [10]=>
  string(1) "|"
  [11]=>
  string(1) " "
  [12]=>
  string(1) "a"
  [13]=>
  string(1) "b"
  [14]=>
  string(1) "c"
  [15]=>
  string(1) "d"
  [16]=>
  string(1) "e"
  [17]=>
  string(1) "f"
  [18]=>
  string(1) " "
  [19]=>
  string(1) "|"
  [20]=>
  string(1) "2"
  [21]=>
  string(1) "|"
  [22]=>
  string(1) " "
  [23]=>
  string(1) "a"
  [24]=>
  string(1) "b"
  [25]=>
  string(1) "c"
  [26]=>
  string(1) "d"
  [27]=>
  string(1) "e"
  [28]=>
  string(1) "f"
  [29]=>
  string(0) ""
}

--> Pattern: '[x]|[^x]'; match: 'abcdef'

Deprecated: Function split() is deprecated in %s on line %d
array(29) {
  [0]=>
  string(0) ""
  [1]=>
  string(0) ""
  [2]=>
  string(0) ""
  [3]=>
  string(0) ""
  [4]=>
  string(0) ""
  [5]=>
  string(0) ""
  [6]=>
  string(0) ""
  [7]=>
  string(0) ""
  [8]=>
  string(0) ""
  [9]=>
  string(0) ""
  [10]=>
  string(0) ""
  [11]=>
  string(0) ""
  [12]=>
  string(0) ""
  [13]=>
  string(0) ""
  [14]=>
  string(0) ""
  [15]=>
  string(0) ""
  [16]=>
  string(0) ""
  [17]=>
  string(0) ""
  [18]=>
  string(0) ""
  [19]=>
  string(0) ""
  [20]=>
  string(0) ""
  [21]=>
  string(0) ""
  [22]=>
  string(0) ""
  [23]=>
  string(0) ""
  [24]=>
  string(0) ""
  [25]=>
  string(0) ""
  [26]=>
  string(0) ""
  [27]=>
  string(0) ""
  [28]=>
  string(0) ""
}

--> Pattern: '(a{1})(a{1,}) (b{1,3}) (c+) (d?ddd|e)'; match: '--- aaa bbb ccc ddd ---'

Deprecated: Function split() is deprecated in %s on line %d
array(4) {
  [0]=>
  string(4) "--- "
  [1]=>
  string(13) " --- |1| --- "
  [2]=>
  string(13) " --- |2| --- "
  [3]=>
  string(4) " ---"
}

--> Pattern: '\\\`\^\.\[\$\(\)\|\*\+\?\{\''; match: '\`^.[$()|*+?{''

Deprecated: Function split() is deprecated in %s on line %d
array(4) {
  [0]=>
  string(0) ""
  [1]=>
  string(5) " |1| "
  [2]=>
  string(5) " |2| "
  [3]=>
  string(0) ""
}

--> Pattern: '\a'; match: 'a'

Deprecated: Function split() is deprecated in %s on line %d
array(4) {
  [0]=>
  string(0) ""
  [1]=>
  string(5) " |1| "
  [2]=>
  string(5) " |2| "
  [3]=>
  string(0) ""
}

--> Pattern: '[0-9][^0-9]'; match: '2a'

Deprecated: Function split() is deprecated in %s on line %d
array(6) {
  [0]=>
  string(0) ""
  [1]=>
  string(2) " |"
  [2]=>
  string(1) " "
  [3]=>
  string(2) " |"
  [4]=>
  string(1) " "
  [5]=>
  string(0) ""
}

--> Pattern: '^[[:alnum:]]{62,62}$'; match: '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'

Deprecated: Function split() is deprecated in %s on line %d
array(1) {
  [0]=>
  string(196) "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ |1| 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ |2| 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
}

--> Pattern: '^[[:digit:]]{5}'; match: '0123456789'

Deprecated: Function split() is deprecated in %s on line %d
array(2) {
  [0]=>
  string(0) ""
  [1]=>
  string(35) "56789 |1| 0123456789 |2| 0123456789"
}

--> Pattern: '[[:digit:]]{5}$'; match: '0123456789'

Deprecated: Function split() is deprecated in %s on line %d
array(2) {
  [0]=>
  string(35) "0123456789 |1| 0123456789 |2| 01234"
  [1]=>
  string(0) ""
}

--> Pattern: '[[:blank:]]{1,10}'; match: '
 	'

Deprecated: Function split() is deprecated in %s on line %d
array(6) {
  [0]=>
  string(1) "
"
  [1]=>
  string(3) "|1|"
  [2]=>
  string(1) "
"
  [3]=>
  string(3) "|2|"
  [4]=>
  string(1) "
"
  [5]=>
  string(0) ""
}

--> Pattern: '[[:print:]]{3}'; match: ' a '

Deprecated: Function split() is deprecated in %s on line %d
array(7) {
  [0]=>
  string(0) ""
  [1]=>
  string(0) ""
  [2]=>
  string(0) ""
  [3]=>
  string(0) ""
  [4]=>
  string(0) ""
  [5]=>
  string(0) ""
  [6]=>
  string(1) " "
}
Done
