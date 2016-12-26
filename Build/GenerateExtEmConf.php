#!/usr/bin/php
<?php

$composerJson = json_decode(file_get_contents(__DIR__ . '/../composer.json'), true);

$extEmConfContent = [
    'title' => 'HTML minify',
    'description' => $composerJson['description'],
    'category' => 'FE',
    'author' => $composerJson['authors'][0]['name'],
    'author_email' => $composerJson['authors'][0]['email'],
    'author_company' => $composerJson['authors'][0]['homepage'],
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'version' => '1.1.1',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.9.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    $composerJson['autoload']
];

$extEmConfContent = '<?php

$EM_CONF[$_EXTKEY] = ' . var_export($extEmConfContent, true) . ';
';

file_put_contents(__DIR__ . '/../ext_emconf.php', $extEmConfContent);
