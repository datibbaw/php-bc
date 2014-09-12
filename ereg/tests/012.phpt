--TEST--
nonexisting back reference
--XFAIL--
This is rather tricky behaviour
--FILE--
<?php $a="abc123";
  echo ereg_replace("123",'def\1ghi',$a)?>
--EXPECTF--
Deprecated: Function ereg_replace() is deprecated in %s on line %d
abcdef\1ghi
