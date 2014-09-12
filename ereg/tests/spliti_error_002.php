<?php
/* Prototype  : proto array spliti(string pattern, string string [, int limit])
 * Description: spliti string into array by regular expression 
 * Source code: ext/standard/reg.c
 * Alias to functions: 
 */

/*
 * Test bad regular expressions
 */

echo "*** Testing spliti() : error conditions ***\n";

$regs = 'original';

var_dump(spliti("", "hello"));
var_dump(spliti("c(d", "hello"));
var_dump(spliti("a[b", "hello"));
var_dump(spliti("c(d", "hello"));
var_dump(spliti("*", "hello"));
var_dump(spliti("+", "hello"));
var_dump(spliti("?", "hello"));
var_dump(spliti("(+?*)", "hello", $regs));
var_dump(spliti("h{256}", "hello"));
var_dump(spliti("h|", "hello"));
var_dump(spliti("h{0}", "hello"));
var_dump(spliti("h{2,1}", "hello"));
var_dump(spliti('[a-c-e]', 'd'));
var_dump(spliti('\\', 'x'));
var_dump(spliti('([9-0])', '1', $regs));

//ensure $regs unchanged
var_dump($regs);

echo "Done";
?>
