<?php
/**
 * Markdown类
 * User: Woozee
 * Date: 2020/12/25
 * Time: 11:16
 */

namespace App\Libs\Vendor\Markdown;

use League\HTMLToMarkdown\HtmlConverter;

class Markdown
{
    protected \Parsedown $parser;
    protected HtmlConverter $converter;

    public function __construct(\Parsedown $parser, HtmlConverter $converter)
    {
        $this->parser = $parser;
        $this->converter = $converter;
    }

    public function toHtml(string $markdown): string
    {
        return $this->parser->text($markdown);
    }

    public function toMarkdown(string $html): string
    {
        return $this->converter->convert($html);
    }
}
