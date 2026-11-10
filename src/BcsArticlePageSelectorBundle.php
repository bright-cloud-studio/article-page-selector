<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Article Page Selector
 * @license    MIT
 * @see        https://github.com/bright-cloud-studio/article-page-selector
 */

declare(strict_types=1);

namespace Bcs\ArticlePageSelectorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BcsArticlePageSelectorBundle extends Bundle
{
    /**
     * Return the bundle root rather than src/, so Contao finds the resources
     * in contao/dca/ and contao/languages/ at the package root
     */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
