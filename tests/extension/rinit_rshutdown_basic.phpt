--TEST--
Basic RINIT/RSHUTDOWN sequence with mock helper
--INI--
datadog.appsec.log_file=/tmp/php_appsec_test.log
datadog.appsec.waf_timeout=42
datadog.appsec.log_level=debug
--ENV--
REQUEST_URI=/my/ur+%00i%0/?key[a][]=v%61l&key[a][]=val2&foo=bar
URL_SCHEME=http
HTTP_CONTENT_TYPE=text/plain
HTTP_CONTENT_LENGTH=0
--COOKIE--
c[a]=3; d[]=5; d[]=6
--GET--
key[a][]=v%61l&key[a][]=val2&foo=bar
--FILE--
<?php
use function datadog\appsec\testing\{rinit,rshutdown};

include __DIR__ . '/inc/mock_helper.php';

$helper = Helper::createRun([['ok'], ['ok']]);

//\datadog\appsec\testing\stop_for_debugger();
var_dump(rinit());
var_dump(rshutdown());

$helper->print_commands();

?>
--EXPECTF--
bool(true)
bool(true)
Array
(
    [0] => Array
        (
            [0] => client_init
            [1] => Array
                (
                    [0] => %s
                    [1] => %s
                    [2] => %s
                    [3] => Array
                        (
                            [rules_file] => /my/rules_file.json
                            [waf_timeout_ms] => 42
                        )

                )

        )

    [1] => Array
        (
            [0] => request_init
            [1] => Array
                (
                    [0] => Array
                        (
                            [server.request.body] => Array
                                (
                                )

                            [server.request.body.filenames] => Array
                                (
                                )

                            [server.request.body.files_field_names] => Array
                                (
                                )

                            [server.request.body.raw] => 
                            [server.request.cookies] => Array
                                (
                                    [c] => Array
                                        (
                                            [a] => 3
                                        )

                                    [d] => Array
                                        (
                                            [0] => 5
                                            [1] => 6
                                        )

                                )

                            [server.request.headers.no_cookies] => Array
                                (
                                    [content-length] => 0
                                    [content-type] => text/plain
                                )

                            [server.request.method] => GET
                            [server.request.path_params] => Array
                                (
                                    [0] => my
                                    [1] => ur+ i%0
                                )

                            [server.request.query] => Array
                                (
                                    [foo] => bar
                                    [key] => Array
                                        (
                                            [a] => Array
                                                (
                                                    [0] => val
                                                    [1] => val2
                                                )

                                        )

                                )

                            [server.request.uri.raw] => /my/ur+%00i%0/?key[a][]=v%61l&key[a][]=val2&foo=bar
                        )

                )

        )

)
