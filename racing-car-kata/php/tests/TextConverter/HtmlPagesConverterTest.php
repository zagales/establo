<?php

declare(strict_types=1);

namespace Tests\TextConverter;

use PHPUnit\Framework\TestCase;
use RacingCar\TextConverter\HtmlPagesConverter;

class HtmlPagesConverterTest extends TestCase
{  
    public function testGetFirstHtmlPage(): void
    {
        $expectedHtmlContent = 'page1 line1<br />page1 line2<br />';
        
        $converter = new HtmlPagesConverter(__DIR__ . '/files/unicodePaginatedFile.txt');
        $htmlResult = $converter->getHtmlPage(1);
        
        $this->assertEquals($expectedHtmlContent, $htmlResult);        
    }

    public function testThrowExceptionOnNonExistingPages(): void
    {
        
        $converter = new HtmlPagesConverter(__DIR__ . '/files/unicodePaginatedFile.txt');
      
        $this->expectException(\Exception::class);
        $requestedPage = 6;
        $this->expectExceptionMessage('Page ' . $requestedPage . ' not found');
      
        $htmlResult = $converter->getHtmlPage($requestedPage);

        
    }
}
