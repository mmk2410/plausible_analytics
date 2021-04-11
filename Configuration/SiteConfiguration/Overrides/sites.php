<?php
// Add a input field at the site configuration for defining the Plausible host URL.

// Configure simple input field for the Plausible URL
$GLOBALS['SiteConfiguration']['site']['columns']['plausible_url'] = [
    'label' => 'LLL:EXT:plausible_analytics/Resources/Private/Language/locallang.xlf:url',
    'description' => 'LLL:EXT:plausible_analytics/Resources/Private/Language/locallang.xlf:urlDescription',
    'config' => [
        'eval' => 'trim',
        'type' => 'input',
    ],
];

// Configure simple input field for the Plausible domain
$GLOBALS['SiteConfiguration']['site']['columns']['plausible_domain'] = [
    'label' => 'LLL:EXT:plausible_analytics/Resources/Private/Language/locallang.xlf:domain',
    'description' => 'LLL:EXT:plausible_analytics/Resources/Private/Language/locallang.xlf:domainDescription',
    'config' => [
        'eval' => 'trim',
        'type' => 'input',
    ],
];

// Add the input field in an own section at the end.
$GLOBALS['SiteConfiguration']['site']['types']['0']['showitem'] .= ', --div--;LLL:EXT:plausible_analytics/Resources/Private/Language/locallang.xlf:tab, plausible_url, plausible_domain';
