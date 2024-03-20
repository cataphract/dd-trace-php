<?php

return [
    __DIR__ . '/../api/Contracts/Tracer.php',
    __DIR__ . '/../api/Contracts/Span.php',
    __DIR__ . '/../api/Contracts/Scope.php',
    __DIR__ . '/../api/Contracts/ScopeManager.php',
    __DIR__ . '/../api/Contracts/SpanContext.php',
    __DIR__ . '/../api/Data/SpanContext.php',
    __DIR__ . '/../api/Data/Span.php',
    __DIR__ . '/../api/Sampling/PrioritySampling.php',
    __DIR__ . '/../api/Transport.php',
    __DIR__ . '/../api/Obfuscation/WildcardToRegex.php',
    __DIR__ . '/../api/Reference.php',
    __DIR__ . '/../api/Exceptions/InvalidReferenceArgument.php',
    __DIR__ . '/../api/Exceptions/UnsupportedFormat.php',
    __DIR__ . '/../api/Exceptions/InvalidSpanArgument.php',
    __DIR__ . '/../api/Exceptions/InvalidReferencesSet.php',
    __DIR__ . '/../api/Exceptions/InvalidSpanOption.php',
    __DIR__ . '/../api/GlobalTracer.php',
    __DIR__ . '/../api/Format.php',
    // TODO check if we can fully remove logger or replace it by something vastly simpler. Doesn't need to be part of API?
    __DIR__ . '/../api/Log/LoggerInterface.php',
    __DIR__ . '/../api/Log/InterpolateTrait.php',
    __DIR__ . '/../api/Log/LogLevel.php',
    __DIR__ . '/../api/Log/Logger.php',
    __DIR__ . '/../api/Log/AbstractLogger.php',
    __DIR__ . '/../api/Log/ErrorLogLogger.php',
    __DIR__ . '/../api/Log/NullLogger.php',
    __DIR__ . '/../api/Log/LoggingTrait.php',
    __DIR__ . '/../api/StartSpanOptions.php',
    __DIR__ . '/../DDTrace/SpanContext.php',
    __DIR__ . '/../DDTrace/Span.php',
    __DIR__ . '/../DDTrace/Time.php',
    __DIR__ . '/../DDTrace/Transport/Internal.php',
    __DIR__ . '/../DDTrace/Processing/TraceAnalyticsProcessor.php',
    __DIR__ . '/../DDTrace/Scope.php',
    __DIR__ . '/../DDTrace/Propagator.php',
    __DIR__ . '/../DDTrace/Propagators/TextMap.php',
    __DIR__ . '/../DDTrace/ScopeManager.php',
    __DIR__ . '/../DDTrace/Tracer.php',
];
