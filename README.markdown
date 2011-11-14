sf2GitHook
==========

sf2GitHook is a basic implementation of various validations using the GIT hooks for Symfony2 projects.
Out of the box, the pre-commit hook is defined to check with php -l and php Code Sniffer for every (and only) files in the commit.
There's also a prepare-commit-msg hook that take care of prefixing the current branch name to the commit message.

Also, every commit made in the 'develop' branch will require all PHPUnit tests of the project to be succesfully complete to allow the commit to be done.

Note that this project is still in a development/beta state.

Requirement
-----------

You need to have PHP, PHPCS, PHPUNIT installed locally.

Installation
------------

    cd /path/to/the/root/of/your/GIT/repository/
    rm .git/hooks/*
    cd .git/hooks
    git clone git@github.com:idealtech/sf2githook.git .
    
    cp hook-config.php.template hook-config.php
    nano hook-config.php

Edit the hook-config.php to define the path the php, phpcs and phpunit.

_Note:_

* The master branch contain the hooks.
* The default branch contain the default inactive hooks samples.

