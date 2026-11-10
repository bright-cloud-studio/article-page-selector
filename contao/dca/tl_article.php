<?php

/**
 * @copyright  Bright Cloud Studio
 * @author     Bright Cloud Studio
 * @package    Article Page Selector
 * @license    MIT
 * @see        https://github.com/bright-cloud-studio/article-page-selector
 */

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;

/** Table tl_article */

// Palettes
// Anchor the legend before the template legend so the field sits between
// "Syndication" and "Template settings", where editors expect it
PaletteManipulator::create()
    ->addLegend('article_page_selector_legend', 'template_legend', PaletteManipulator::POSITION_BEFORE)
    ->addField('selected_page', 'article_page_selector_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_article');

// Fields
$GLOBALS['TL_DCA']['tl_article']['fields']['selected_page'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['selected_page'],
    'inputType'               => 'pageTree',
    'foreignKey'              => 'tl_page.title',
    'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr'),
    'sql'                     => array('type'=>'integer', 'unsigned'=>true, 'default'=>0),
    'relation'                => array('type'=>'hasOne', 'load'=>'lazy')
);
