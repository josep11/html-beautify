<?php

use Wongyip\HTML\Beautify;

require_once __DIR__ . '/../vendor/autoload.php';

$html = file_get_contents(__DIR__ . '/sample.html');

$options = [
    'indent_inner_html'     => false,
    'indent_char'           => " ",
    'indent_size'           => 4,
    'wrap_line_length'      => 32768,
    'unformatted'           => ['code', 'pre'],
    'preserve_newlines'     => false,
    'max_preserve_newlines' => 32768,
    'indent_scripts'        => 'normal', // keep|separate|normal
];

$output = Beautify::html($html, $options);

$line = str_repeat('-', 80);

echo "\nInput:\n$line\n\n$html\n\nOutput:\n$line\n\n$output\n\n";