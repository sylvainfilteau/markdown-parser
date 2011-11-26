#!/usr/bin/php
<?php

if (getenv('MKD')) {
	set_include_path(get_include_path() . PATH_SEPARATOR . realpath(getenv('MKD')));
}

require_once('Zend/Loader/Autoloader.php');

$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('Zend');
$autoloader->registerNamespace('Markdown');

use Markdown\Parser;

try {
	$opts = new Zend_Console_Getopt(array(
		'extra' => 'Use the extra parser'
	));
	$opts->parse();
} catch (Zend_Console_Getopt_Exception $e) {
	echo $e->getUsageMessage();
	exit(1);
}
$args = $opts->getRemainingArgs();

$parser_type = $opts->extra ? 'extra' : '';
$file = trim(array_shift($args));

if (!$file || $file == "-") {
	$file = 'php://stdin';
} elseif (!(is_file($file) && is_readable($file))) {
	echo "'$file' is not readable\n";
	exit(1);
}

$content = file_get_contents($file);

$parser = Parser::factory($parser_type);
echo $parser->transform($content);
