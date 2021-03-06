<?php

declare(strict_types=1);

namespace RacingCar\TextConverter;

class UnicodeFileToHtmlTextConverter
{
    private $fullFileNameWithPath;

    public function __construct(string $fullFileNameWithPath)
    {
        $this->fullFileNameWithPath = $fullFileNameWithPath;
    }

    public function convertToHtml(): string
    {
        $f = fopen($this->fullFileNameWithPath, 'r');
        $html = '';
        if ($f) {
            while (!feof($f)){
                $lineContent = fgets($f);
                if($lineContent === false){
                    $lineContent = '';
                }
                $line = rtrim($lineContent);
                $html .= htmlspecialchars($line, ENT_QUOTES | ENT_HTML5);
                $html .= '<br />';
            }
        }
        fclose($f);
        return $html;
    }

    public function getFileName()
    {
        return $this->fullFileNameWithPath;
    }
}
