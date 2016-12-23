<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// For not-cached output
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] =
    \Markussom\HtmlCompress\Hook\ContentPostProcessor::class . '->render';

// for cached output
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][] =
    \Markussom\HtmlCompress\Hook\ContentPostProcessor::class . '->render';
