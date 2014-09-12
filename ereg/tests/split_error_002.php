<?php
/* Prototype  : proto array split(string pattern, string string [, int limit])
 * Description: Split string into array by regular expression 
 * Source code: ext/standard/reg.c
 * Alias to functions: 
 */

/*
 * Test bad regular expressions
 */

echo "*** Testing split() : error conditions ***\n";

$regs = 'original';

var_dump(split("", "hello"));
var_dump(split("c(d", "hello"));
var_dump(split("a[b", "hello"));
var_dump(split("c(d", "hello"));
var_dump(split("*", "hello"));
var_dump(split("+", "hello"));
var_dump(split("?", "hello"));
var_dump(split("(+?*)", "hello", $regs));
var_dump(split("h{256}", "hello"));
var_dump(split("h|", "hello"));
var_dump(split("h{0}", "hello"));
var_dump(split("h{2,1}", "hello"));
var_dump(split('[a-c-e]', 'd'));
var_dump(split('\\', 'x'));
var_dump(split('([9-0])', '1', $regs));

//ensure $regs unchanged
var_dump($regs);

echo "Done";
?>
