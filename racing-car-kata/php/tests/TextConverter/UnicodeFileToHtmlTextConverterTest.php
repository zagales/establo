<?php

declare(strict_types=1);

namespace Tests\TextConverter;

use PHPUnit\Framework\TestCase;
use RacingCar\TextConverter\UnicodeFileToHtmlTextConverter;

class UnicodeFileToHtmlTextConverterTest extends TestCase
{
    public function testFoo(): void
    {
        $converter = new UnicodeFileToHtmlTextConverter('foo');
        $this->assertSame('fixme', $converter->getFileName());
    }
}
