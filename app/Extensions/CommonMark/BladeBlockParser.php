<?php

namespace App\Extensions\CommonMark;

use League\CommonMark\Extension\CommonMark\Node\Block\HtmlBlock;
use League\CommonMark\Parser\Block\AbstractBlockContinueParser;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Cursor;

class BladeBlockParser extends AbstractBlockContinueParser
{
    private HtmlBlock $block;

    private array $lines = [];

    private bool $finished = false;

    public function __construct(private string $tag)
    {
        $this->block = new HtmlBlock(HtmlBlock::TYPE_6_BLOCK_ELEMENT);
    }

    public function getBlock(): HtmlBlock
    {
        return $this->block;
    }

    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser): ?BlockContinue
    {
        return $this->finished ? BlockContinue::none() : BlockContinue::at($cursor);
    }

    public function addLine(string $line): void
    {
        $this->lines[] = $line;
        $content = implode("\n", $this->lines);

        // Quoted attributes can contain HTML, including a self-closing tag.
        $opening = '/^\s*<'.$this->tag.'\b(?:[^>"\']|"[^"]*"|\'[^\']*\')*>/s';

        if (preg_match($opening, $content, $matches)) {
            $this->finished = str_ends_with($matches[0], '/>')
                || str_contains(substr($content, strlen($matches[0])), '</'.$this->tag.'>');
        }
    }

    public function closeBlock(): void
    {
        $content = implode("\n", $this->lines);

        // Remove the shared source indentation before Blade trims the slot.
        $pattern = '/^(\s*<'.$this->tag.'\b(?:[^>"\']|"[^"]*"|\'[^\']*\')*>)(.*)(<\/'.$this->tag.'>\s*)$/s';
        $content = preg_replace_callback($pattern, function (array $matches): string {
            $body = trim($matches[2], "\r\n");
            preg_match_all('/^[\t ]*(?=\S)/m', $body, $indents);
            $indent = $indents[0] === [] ? 0 : min(array_map('strlen', $indents[0]));

            if ($indent > 0) {
                $body = preg_replace('/^[\t ]{'.$indent.'}/m', '', $body);
            }

            return $matches[1]."\n".$body."\n".$matches[3];
        }, $content);

        $this->block->setLiteral($content);
    }
}
