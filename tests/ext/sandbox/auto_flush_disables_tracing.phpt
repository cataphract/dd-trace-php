--TEST--
Auto-flushing will not instrument while flushing
--ENV--
DD_TRACE_GENERATE_ROOT_SPAN=0
DD_TRACE_TRACED_INTERNAL_FUNCTIONS=array_sum
DD_TRACE_LOG_LEVEL=info,startup=off
--FILE--
<?php
use DDTrace\SpanData;

// This is called from the flush() method of the fake tracer
DDTrace\trace_function('DDTrace\\fake_curl_exec', function (SpanData $span) {
    $span->name = 'fake_curl_exec';
});

DDTrace\trace_function('array_sum', function (SpanData $span, $args, $retval) {
    $span->name = 'array_sum';
    $span->resource = $retval;
});

DDTrace\trace_function('main', function (SpanData $span) {
    $span->name = 'main';
});

function main($max) {
    echo array_sum(range(0, $max)) . PHP_EOL;
    echo array_sum(range(0, $max + 1)) . PHP_EOL;
}

main(2);
echo PHP_EOL;
main(4);
echo PHP_EOL;
main(6);
echo PHP_EOL;
?>
--EXPECTF--
3
6
[ddtrace] [info] Flushing trace of size 3 to send-queue for %s

10
15
[ddtrace] [info] Flushing trace of size 3 to send-queue for %s

21
28
[ddtrace] [info] Flushing trace of size 3 to send-queue for %s

[ddtrace] [info] No finished traces to be sent to the agent