<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Plausible Analytics Integration',
    'description' => 'Integrate Plausible analytics into TYPO3',
    'category' => 'fe',
    'author' => 'Marcel Kapfer',
    'author_email' => 'opensource@mmk2410.org',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'php' => '7.2.0-7.4.99'
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'MMK2410\\PlausibleAnalytics\\' => 'Classes'
        ]
    ],
];
