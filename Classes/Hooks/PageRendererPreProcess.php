<?php

namespace MMK2410\PlausibleAnalytics\Hooks;

use TYPO3\CMS\Core\Page\AssetCollector;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Context\Context;

class PageRendererPreProcess
{
    /** @var \TYPO3\CMS\Core\Page\AssetCollector */
    private $assetCollector;

    /** @var \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController */
    private $tsfe;

    /** @var Context */
    private $context;

    public function __construct(AssetCollector $assetCollector = null)
    {
        $this->assetCollector = $assetCollector ?? GeneralUtility::makeInstance(AssetCollector::class);
        $this->tsfe = $GLOBALS['TSFE'] ?? null;
        $this->context = GeneralUtility::makeInstance(Context::class);
    }

    public function addLibrary(): void
    {
        if (!isset($this->tsfe)|| !isset($this->context)) {
            return;
        }

        $domain = $this->getDomain();
        $plausible = $this->getPlausibleURL();

        if (
            isset($domain) &&
            isset($plausible) &&
            !$this->context->getPropertyFromAspect('backend.user', 'isLoggedIn')
        ) {
            $this->assetCollector->addJavaScript(
                'plausible_analytics',
                $plausible . '/js/plausible.js',
                [
                    'async' => 'async',
                    'defer' => 'defer',
                    'data-domain' => $domain
                ],
            );
        }
    }

    protected function getPlausibleURL(): ?string
    {
        if (!isset($this->tsfe)) {
            return null;
        }

        return $this->tsfe->getSite()->getConfiguration()['plausible_url'] ?? null;
    }

    protected function getDomain(): ?string
    {
        if (!isset($this->tsfe)) {
            return null;
        }

        $domain = $this->tsfe->getSite()->getConfiguration()['plausible_domain'];

        if (!empty($domain)) {
            return $domain;
        }

        $base = $this->tsfe->getSite()->getConfiguration()['base'];

        if (!isset($base)) {
            return null;
        }

        if (strpos($base, 'http://') !== false || strpos($base, 'https://') !== false) {
            return preg_replace('/https?:\/\/([^\/\n]*).*/', '$1', $base);
        } else {
            return null;
        }
    }
}
