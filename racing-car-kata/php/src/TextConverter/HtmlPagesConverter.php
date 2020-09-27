<?php

declare(strict_types=1);

namespace RacingCar\TextConverter;

/**
 * Class HtmlPages
 * This is a second, slightly harder problem on the same theme as the UnicodeFileToHtmlTextConverter
 *
 * @package RacingCar\TextConverter
 */
class HtmlPagesConverter
{
    private $filename;

    private $breaks;

    /**
     * HtmlPages constructor.
     * Reads the file and note the positions of the page breaks so we can access them quickly
     */
    public function __construct(string $filename, PageBreakFileParser $pageBreakFileParser)
    {
        $this->breaks = $pageBreakFileParser->getPageBreaks();
        $this->filename = $filename;
    }

    /**
     * @param int $page Page number
     * @return string HTML page with the given number
     */
    public function getHtmlPage(int $page): string
    {
        $index = $page - 1;

        if (!isset($this->breaks[$index])) {
            throw new \Exception(sprintf('Page %d not found', $page), 404);
        }

        $pageStart = $this->breaks[$index];
        $pageEnd = $this->breaks[$index + 1];
        $html = '';
        $f = fopen($this->filename, 'r');
        fseek($f, $pageStart);
        while (ftell($f) !== $pageEnd) {
            $line = fgets($f);

            if ($line === false) {
                $line = '';
            }

            $line = rtrim($line);

            $html .= htmlspecialchars($line, ENT_QUOTES | ENT_HTML5);
            $html .= '<br />';
        }
        fclose($f);
        return $html;
    }
}
