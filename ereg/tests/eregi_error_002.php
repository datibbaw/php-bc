<?php
/* Prototype  : proto int eregi(string pattern, string string [, array registers])
 * Description: Regular expression match 
 * Source code: ext/standard/reg.c
 * Alias to functions: 
 */

/*
 * Test bad regular expressions
 */

echo "*** Testing eregi() : error conditions ***\n";

$regs = 'original';

var_dump(eregi("", "hello"));
var_dump(eregi("c(d", "hello"));
var_dump(eregi("a[b", "hello"));
var_dump(eregi("c(d", "hello"));
var_dump(eregi("*", "hello"));
var_dump(eregi("+", "hello"));
var_dump(eregi("?", "hello"));
var_dump(eregi("(+?*)", "hello", $regs));
var_dump(eregi("h{256}", "hello"));
var_dump(eregi("h|", "hello"));
var_dump(eregi("h{0}", "hello"));
var_dump(eregi("h{2,1}", "hello"));
var_dump(eregi('[a-c-e]', 'd'));
var_dump(eregi('\\', 'x'));
var_dump(eregi('([9-0])', '1', $regs));

//ensure $regs unchanged
var_dump($regs);

echo "Done";
?>
