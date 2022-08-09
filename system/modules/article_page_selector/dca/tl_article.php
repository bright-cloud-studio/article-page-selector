<?php

/**
 * Bright Cloud Studio's Article Page Selector
 *
 * Copyright (C) 2021 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/article-page-selector
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
**/

 /* Extend the tl_user palettes */
foreach ($GLOBALS['TL_DCA']['tl_article']['palettes'] as $k => $v) {
    $GLOBALS['TL_DCA']['tl_article']['palettes'][$k] = str_replace('inColumn;', 'inColumn;{article_page_selector_legend},selected_page;', $v);
}

/* Add fields to tl_user */
$GLOBALS['TL_DCA']['tl_article']['fields']['selected_page'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['selected_page'],
	'inputType'               => 'pageTree',
	'foreignKey'              => 'tl_page.title',
	'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr'),
	'sql'                     => "int(10) unsigned NOT NULL default 0",
	'relation'                => array('type'=>'hasOne', 'load'=>'lazy')
);
