# PHP Markdown for PHP5.3

This repository is a small refresh of the [PHP Markdown codebase from Michel Fortin](https://github.com/michelf/php-markdown). File structure has been cleaned up and classes have been updated to use syntax from PHP5.3 (ie. visibility keywords, new constructor, namespaces, closures). Also, constants have been removed to use class configuration.

I could go further and rewrite class and methods comments to be compatible with PHP Documentator, maybe another time!

## Install

    pear channel-discover pear.ada-consult.com
    pear install ada/Markdown_Parser

## How to use

When using a [psr-0 compliant](http://groups.google.com/group/php-standards) autoloader, you should use it like it :

```php
<?php

use Markdown\Parser;

$text = "# Markdown string

This is a markdown formatted string";

$parser = new Parser();
echo $parser->transform($text);
```

This code snippet should output:

    <h1>Markdown string</h1>
    
    <p>This is a markdown formatted string</p>

If you want to use the Markdown Parser & Extra from Michel Fortin, just use the Markdown\ParserExtra class.

## Configuration

### Markdown\Parser

 * *empty_element_suffix* The empty tag ending string. Use ">" for HTML output.
 * *tab_width* Number of space for each tab. Default value is 4.

### Markdown\ParserExtra

 * *fn_link_title*
 * *fn_backlink_title*
 * *fn_link_class*
 * *fn_backlink_class*

## Command line

As an extra, I added a markdown.php script in the PEAR packge to process markdown in command line.

To use it, you need to install Zend Framework 1.10+ and ensure that it is in your PHP include\_path.

*USAGE* markdown.php [your_file.md]
