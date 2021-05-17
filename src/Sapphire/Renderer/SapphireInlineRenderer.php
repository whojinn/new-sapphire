<?php

namespace Whojinn\Sapphire\Renderer;

use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;
use Whojinn\Sapphire\Node\RubyNode;

class SapphireInlineRenderer implements InlineRendererInterface
{
    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer)
    {
        if (!($inline instanceof RubyNode)) {
            throw new \InvalidArgumentException('Incompatible inline type: '.get_class($inline));
        }

        $attrs = $inline->getData('attributes', []);

        return new HtmlElement('ruby', $attrs, $htmlRenderer->renderInlines($inline->children()));
    }
}
