# Amazon Associates Widget Mediawiki Extension

[![Latest Stable Version](https://poser.pugx.org/multidimensional/amazon-widget/v/stable.svg)](https://packagist.org/packages/multidimensional/amazon-widget)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.4-8892BF.svg)](https://php.net/)
[![License](https://poser.pugx.org/multidimensional/amazon-widget/license.svg)](https://packagist.org/packages/multidimensional/amazon-widget)
[![Total Downloads](https://poser.pugx.org/multidimensional/amazon-widget/d/total.svg)](https://packagist.org/packages/multidimensional/amazon-widget)

A [MediaWiki](http://www.mediawiki.org/) Extension for adding Amazon Associate Widgets to your Wiki.

## Requirements

* Mediawiki 1.25+

## Installation

Download the extension and add it to your extensions folder, or install it by adding it to your ```composer.local.json``` file:

```
{
    "require": {
        "multidimensional/amazon-widget": "*"
    }
}
```

Activate the extension in ```LocalSettings.php``` and set your Amazon tag.

```php
wfLoadExtension( 'AmazonWidget' );
$wgAmazonWidgetTag = 'YOUR-AMAZON-TAG-HERE-20';
```

That's it!

## Usage in MediaWiki

To use the Amazon tag, it is very easy. There are two elements that are required:

* ASIN (product code)
* Link ID (from your Amazon Associates link)

Example:

```$xslt
<amazon asin="B07N7RXQF6"
    id="5d90afe84e9cd34fb5a0f1fac6b9bf8d"/>
```

You can also add advanced tags:

* Width (pixel count or percentage)
* Height (pixel count or percentage)
* Style (any css style information)

Example:

```$xslt
<amazon asin="B07N7RXQF6"
    id="5d90afe84e9cd34fb5a0f1fac6b9bf8d"
    width="200"
    height="150"
    style="float:right;"/>
```

Additional configuration options can be hardcoded in your ```LocalSettings.php``` file.

## Advanced Configuration

Hard coded settings can also be added in your ```LocalSettings.php``` file. These will affect appearances across all Widgets, but note that your cache will need to be cleared for all changes to take effect.

Here are the default values:

```php
$wgAmazonWidgetRegion = 'US';
$wgAmazonWidgetWidth = 120;
$wgAmazonWidgetHeight = 240;
$wgAmazonWidgetNewWindow = false;
$wgAmazonWidgetBorder = true;
$wgAmazonWidgetBackground = 'ffffff';
$wgAmazonWidgetTitleColor = '0066c0';
$wgAmazonWidgetPriceColor = '333333';
$wgAmazonWidgetMarketplace = 'amazon';
```

## License

    The MIT License (MIT)

    Copyright (c) 2019 multidimension.al
	
    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.
