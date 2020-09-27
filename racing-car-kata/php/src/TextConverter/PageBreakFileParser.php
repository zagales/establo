<?php
declare (strict_types = 1);

namespace RacingCar\TextConverter;

class PageBreakFileParser
{
    private $filename;
    private $breaks = [];

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function getPageBreaks()
    {
        $this->breaks = [0];
        $f = fopen($this->filename, 'r');
        while (!feof($f)) {
            $lineContent = fgets($f);
            if ($lineContent === false) {
                $lineContent = '';
            }
            $line = rtrim($lineContent);

            if (strpos($line, 'PAGE_BREAK') !== false) {
                $this->breaks[] = ftell($f) - strlen('PAGE_BREAK') - 1;
            }
        }
        $this->breaks[] = ftell($f);
        fclose($f);

        return $this->breaks;
    }
}