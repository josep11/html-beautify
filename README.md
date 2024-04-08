# Beautify HTML

Based on the [original work](https://github.com/ivanweiler/beautify-html) by [Ivan Weiler](https://github.com/ivanweiler), I am here to bring it to the [Packagist](https://packagist.org/) only, no new feature is added.

Please see the original [`README`](README.org.md) for details.

## Installation
```sh
composer require wongyip/html-beautify
```

## Usage
The same usage with the original html-beautify is maintained, except of the
namespaced classname. However, in most cases (at least in my cases), the 
beautifier would be used once only within the whole request/command life cycle,
so the static `init()` syntax is my all-time favourite.    
```php
use \Wongyip\HTML\Beautify;

$html = <<<HTML
    <!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Title</title></head>
    <body><div class="row col-sm12"><ol><li></li><li></li><li></li></ol></div></body></html>
    HTML;

# The good old way.
$beautifier = new Beautify();
echo $beautifier->beautify($html);

# Same output with the added static methods
echo Beautify::init()->beautify($html);

# Same output, but the syntax is not my favour at all. 
echo (new Beautify())->beautify($html);

```
_Output:_
```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
<div class="row" style="color: brown;">
    <ul>
        <li>Hello</li>
        <li>World!</li>
    </ul>
</div>
</body>

</html>
```

## Options
```php
use \Wongyip\HTML\Beautify;

# Set on instantiate.
$options = [
    'indent_inner_html'     => false,
    'indent_char'           => " ",
    'indent_size'           => 4,
    'wrap_line_length'      => 32768,
    'unformatted'           => ['code', 'pre'],
    'preserve_newlines'     => false,
    'max_preserve_newlines' => 32768,
    'indent_scripts'        => 'normal',
];
$beautifier = new Beautify($options);

# Update
$beautifier->options(['indent_size' => 2]);

# Get
$options = $beautifier->options();
```

## Try it out
```bash
composer create-project wongyip/html-beautify
cd html-beautify
composer install
php demo/demo.php
```