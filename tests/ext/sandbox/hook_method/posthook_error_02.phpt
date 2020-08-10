--TEST--
DDTrace\hook_method posthook error is sandboxed (debug)
--ENV--
DD_TRACE_DEBUG=1
--INI--
error_reporting=E_ALL
--FILE--
<?php

DDTrace\hook_method('Greeter', 'greet',
    null,
    function ($args, $retval) {
        echo "Greeter::greet hooked.\n";
        $i = $this_normally_raises_a_notice; // E_NOTICE
    }
);

final class Greeter
{
    public static function greet($name)
    {
        echo "Hello, {$name}.\n";
    }
}

Greeter::greet('Datadog');

?>
--EXPECTF--
Hello, Datadog.
Greeter::greet hooked.
Error raised in ddtrace's closure for Greeter::greet(): Undefined variable: this_normally_raises_a_notice in %s on line %d
