<?php

define('SUCCESS', 0);
define('FAILURE', 1);


// Load and check the configuration
if (!file_exists('.git/hooks/hook-config.php')){
    echo "/!\\ Could not load the hooks configuration at " . getcwd() . ".git/hooks/hook-config.php.";
    echo PHP_EOL;
    exit(1);
}

require('hook-config.php');

if (!defined('CONFIG_VERSION') || CONFIG_VERSION != '0.2.0') {
    echo "/!\\ The configuration doesn't match the hooks requirement. Please check .git/hooks/hook-config.php.template to update your configuration file.";
    echo PHP_EOL;
    exit(1);
}



/**
 * Find the current branch name from witch the commit is beeing done.
 *
 * @return string|false Branch name.
 */
function getCurrentBranchName(){
    $output = array();
    $rc     = 0;
    exec('git branch --no-color 2> /dev/null', $output, $rc);
    if ($rc != 0){
        return false;
    }

    $needle = '/^\* (.+)/';
    foreach ($output as $branch) {
        if (preg_match($needle, $branch, $matches)) {
            return $matches[1];
        }
    }

    return false;
}


/**
 * Extract the list of the files in the commit.
 * This list include without distinction edited/modified and deleted files.
 *
 * @return array File list.
 */
function getCommitFileList(){
    $output = array();
    $rc     = 0;
    exec('git rev-parse --verify HEAD 2> /dev/null', $output, $rc);
    if ($rc == 0)  $against = 'HEAD';
    else           $against = '4b825dc642cb6eb9a060e54bf8d69288fbee4904';

    exec('git diff-index --cached --name-only '. $against, $output);

    return $output;
}