# Plausible Analytics TYPO3 Integration

This plugins provides an integration of the [Plausible analytics software](https://plausible.io) to TYPO3. Currently this consists (only) in adding the script tag for loading the JavaScript tracker.

## Installation

Install this plugin using one of the following possibilities.

- Composer (see https://docs.typo3.org/m/typo3/guide-installation/master/en-us/ExtensionInstallation/Index.html#install-extension-with-composer)
- Extension Manager (see https://docs.typo3.org/m/typo3/guide-installation/master/en-us/ExtensionInstallation/Index.html#install-an-extension-without-composer)
- Download the zip-Archive from the Releases page and install it manually.

## Setup

To enable the Plausible integration for a site you need to edit its site configuration in the "Sites" module. You will find a "Plausible Analytics" tab and there you can provide the following information.

### Plausible URL

Enter here the URL to the Plausible instance you are using. If you registered your site on the main one (plausible.io) then put `https://plausible.io` in here.

For using the Plausible integration this is necessary.

### Domain name for Plausible

You may provide the domain name with which you registered your site at Plausible here. This is the attribute `data-domain` that you can find in the site configuration in Plausible.

If you leave this empty the extension will try to use the value set in the "General" tab under "Entry Point" in the TYPO3 site configuration. If this is not a "real" URL but just a path and the "Domain name for Plausible" fields is left empty then the integration will not be added.

## Check

You should probably check if the script tag for loading the JavaScript tracker is added successfully. To do so visit one of your pages in the frontend and open the page inspector of your browser. In the HTML code you should find a tag like `<script async="async" defer="defer" data-domain="<your data-domain>" src="<your src>"></script>` near the end of the code (but inside the `<body>` tag).
