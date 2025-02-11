<?php

namespace DDTrace\Tests\Unit\Sampling;

use DDTrace\Sampling\AlwaysKeepSampler;
use DDTrace\Span;
use DDTrace\SpanContext;
use DDTrace\SpanData;
use DDTrace\Tests\Common\BaseTestCase;

final class AlwaysKeepSamplerTest extends BaseTestCase
{
    public function testReturnsAlwaysAutoKeep()
    {
        $sampler = new AlwaysKeepSampler();
        $context = new SpanContext('', '');
        $span = new Span(new SpanData(), $context);
        $this->assertSame(1, $sampler->getPrioritySampling($span));
    }
}
