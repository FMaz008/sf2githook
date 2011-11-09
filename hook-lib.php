<?php

define('SUCCESS', 0);
define('FAILURE', 1);

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