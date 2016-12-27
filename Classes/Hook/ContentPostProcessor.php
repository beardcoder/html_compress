<?php
namespace Markussom\HtmlCompress\Hook;

/*
 * This file is part of the TYPO3 console project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read
 * LICENSE file that was distributed with this source code.
 *
 */

use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use WyriHaximus\HtmlCompress\Factory;

/**
 * Class ContentPostProcessor
 * This class use the "WyriHaximus\HtmlCompress" package to
 * minify the TYPO3 frontend output
 *
 * @author Markus Sommer
 */
class ContentPostProcessor
{
    /**
     * This function minify the body
     *
     * @param $funcRef
     * @param TypoScriptFrontendController $tsFrontendController
     */
    public function render($funcRef, $tsFrontendController)
    {
        if ($this->isCompressBodyActive()) {
            $parser = Factory::construct();

            $pattern = '~<body.*?>(.*?)<\/body>~is';
            preg_match($pattern, $tsFrontendController->content, $body);
            $tsFrontendController->content = preg_replace(
                $pattern,
                $parser->compress($body[0]),
                $tsFrontendController->content
            );
        }
    }

    /**
     * Is compress body aktive
     *
     * Pattern in TypoScript:
     * "config.compressBody = 1"
     *
     * @return bool
     */
    protected function isCompressBodyActive()
    {
        return !empty($GLOBALS['TSFE']->config['config']['compressBody']);
    }
}
