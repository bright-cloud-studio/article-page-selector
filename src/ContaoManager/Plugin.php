<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Article Page Selector
 * @license    MIT
 * @see        https://github.com/bright-cloud-studio/article-page-selector
 */

declare(strict_types=1);

namespace Bcs\ArticlePageSelectorBundle\ContaoManager;

use Bcs\ArticlePageSelectorBundle\BcsArticlePageSelectorBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(BcsArticlePageSelectorBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
