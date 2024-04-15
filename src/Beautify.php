<?php

namespace Wongyip\HTML;

/**
 * A wrapper class to the original Beautify_Html class, bringing proper type-hint
 * to IDE, added init() method as static constructor and the options() get-setter
 * method.
 */
class Beautify extends OriginalBeautifyHTML
{
    /**
     * Instantiate a HTML Beautifier.
     *
     * @param array|null $options
     * @param callable|null $cssBeautify
     * @param callable|null $jsBeautify
     */
    public function __construct(array $options = null, callable $cssBeautify = null, callable $jsBeautify = null)
    {
        $defaults = [
            'indent_inner_html'     => false,
            'indent_char'           => " ",
            'indent_size'           => 4,
            'wrap_line_length'      => 32768,
            'unformatted'           => ['code', 'pre'],
            'preserve_newlines'     => false,
            'max_preserve_newlines' => 32768,
            'indent_scripts'        => 'normal',
        ];
        parent::__construct(array_merge($defaults, $options ?? []), $cssBeautify, $jsBeautify);
    }

    /**
     * State-less method.
     *
     * @param string $input
     * @param array|null $options
     * @param callable|null $cssBeautify
     * @param callable|null $jsBeautify
     * @return string
     */
    public static function html(string $input, array $options = null, callable $cssBeautify = null, callable $jsBeautify = null): string
    {
        return Beautify::init($options, $cssBeautify, $jsBeautify)->beautify($input);
    }

    /**
     * Instantiate a HTML Beautifier.
     *
     * @param array|null $options
     * @param callable|null $cssBeautify
     * @param callable|null $jsBeautify
     * @return static
     */
    public static function init(array $options = null, callable $cssBeautify = null, callable $jsBeautify = null): static
    {
        return new static($options, $cssBeautify, $jsBeautify);
    }

    /**
     * Beautify the input HTML.
     *
     * @param string $html
     * @return string
     */
    public function beautify(string $html): string
    {
        return parent::__beautify($html);
    }

    /**
     * Get or set the options. Getter return the $options array, setter merge
     * input into existing options.
     *
     * @param array|null $options
     * @return array|static
     */
    public function options(array $options = null): array|static
    {
        // Get
        if (is_null($options)) {
            return $this->options;
        }
        // Pass to the original setter.
        $this->set_options($options);
        return $this;
    }
}