<?php

//Path to PHPUnit
define('PHPUNIT_PATH', '/usr/local/Cellar/php/5.3.8/bin/phpunit');
/*
Installation of PHPUnit:
    sudo pear config-set auto_discover 1
    sudo pear install pear.phpunit.de/PHPUnit
*/

//Path to PHP Code Sniffer
define('PHPCS_PATH', '/usr/local/Cellar/php/5.3.8/bin/phpcs');
/*
Installation of PHPCS:
    pear install PHP_CodeSniffer
*/
/*
Installation of the Symfony2 Coding Standard:
Find your PEAR directory:
    pear config-show | grep php_dir

Copy, symlink or check out this repo to a folder called Symfony2 inside the phpcs Standards directory:
    cd /path/to/pear/
    cd PHP/CodeSniffer/Standards
    sudo git clone git://github.com/opensky/Symfony2-coding-standard.git Symfony2

Set Symfony2 as your default coding standard:
    sudo phpcs --config-set default_standard Symfony2
*/


//Path to PHP
define('PHP_PATH', '/usr/local/Cellar/php/5.3.8/bin/php');

