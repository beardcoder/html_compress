<?php

$EM_CONF[$_EXTKEY] = array (
  'title' => 'HTML minify',
  'description' => 'Compress/minify your HTML output',
  'category' => 'FE',
  'author' => 'Markus Sommer',
  'author_email' => 'info@creativeworkspace.de',
  'author_company' => 'https://www.creativeworkspace.de',
  'state' => 'stable',
  'clearCacheOnLoad' => 1,
  'version' => '1.1.1',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '7.6.0-8.9.99',
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
