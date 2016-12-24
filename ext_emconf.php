<?php

$EM_CONF[$_EXTKEY] = array (
  'title' => 'markussom/html-compress',
  'description' => 'Compress/minify your HTML',
  'category' => 'FE',
  'author' => 'Markus Sommer',
  'author_email' => 'info@creativeworkspace.de',
  'author_company' => 'https://www.creativeworkspace.de/',
  'state' => 'stable',
  'clearCacheOnLoad' => 1,
  'lockType' => '',
  'version' => '1.0.0',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '7.5.0-7.99.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  0 => 
  array (
    'psr-4' => 
    array (
      'Markussom\\HtmlCompress\\' => 'Classes',
    ),
  ),
);
