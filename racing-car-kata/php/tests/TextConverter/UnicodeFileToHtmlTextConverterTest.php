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
        $this->assertSame('foo', $converter->getFileName());
    }

    public function testBreakLinesAddedToSourceFile(): void
    {
        $converter = new UnicodeFileToHtmlTextConverter(__DIR__ . '/files/unicodeFile.txt');
        $htmlResult = $converter->convertToHtml();
        $breakLines = preg_match_all('/<br \/>/', $htmlResult);
        $this->assertEquals(2, $breakLines);
    }
}
