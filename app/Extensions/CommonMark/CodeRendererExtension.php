<?php

namespace App\Extensions\CommonMark;

use Illuminate\Support\Facades\Blade;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;

class CodeRendererExtension implements ExtensionInterface, NodeRendererInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addRenderer(FencedCode::class, $this, 100);
        $environment->addRenderer(IndentedCode::class, $this, 100);
    }

    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        // Indented code blocks never carry info words, so leave them to the
        // default renderer.
        if ($node instanceof IndentedCode) {
            return null;
        }

        /** @var FencedCode $node  */
        $info = $node->getInfoWords();
        // Look for our magic word
        if (in_array('+parse', $info)) {
            // Run the content through Blade
            return Blade::render($node->getLiteral());
        }
    }
}
