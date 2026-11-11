<?php

namespace App\Extensions\CommonMark;

use League\CommonMark\Parser\Block\BlockStart;
use League\CommonMark\Parser\Block\BlockStartParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;

class BladeBlockStartParser implements BlockStartParserInterface
{
    public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState): ?BlockStart
    {
        if ($cursor->isIndented() || ! preg_match('/^\s*<(x-code-block-wrapper|x-callout)(?=[\s\/>]|$)/', $cursor->getRemainder(), $matches)) {
            return BlockStart::none();
        }

        return BlockStart::of(new BladeBlockParser($matches[1]))->at($cursor);
    }
}
