#!/usr/bin/php
<?php

$composerJson = json_decode(file_get_contents(__DIR__ . '/../composer.json'), true);
$version = getenv('EXT_VERSION');
if (empty($version)) {
    throw new \Exception('No version set use EXT_VERSION="1.0.0-dev ./GenerateExtEmConf.php', 1482615696);
}

$extEmConfContent = [
    'title' => 'HTML minify',
    'description' => $composerJson['description'],
    'category' => 'FE',
    'author' => $composerJson['authors'][0]['name'],
    'author_email' => $composerJson['authors'][0]['email'],
    'author_company' => $composerJson['authors'][0]['homepage'],
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'version' => $version,
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
