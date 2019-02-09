# Amazon Associates Widget Mediawiki Extension

[![Latest Stable Version](https://poser.pugx.org/multidimensional/amazon-widget/v/stable.svg)](https://packagist.org/packages/multidimensional/amazon-widget)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.4-8892BF.svg)](https://php.net/)
[![License](https://poser.pugx.org/multidimensional/amazon-widget/license.svg)](https://packagist.org/packages/multidimensional/amazon-widget)
[![Total Downloads](https://poser.pugx.org/multidimensional/amazon-widget/d/total.svg)](https://packagist.org/packages/multidimensional/amazon-widget)

A [MediaWiki](http://www.mediawiki.org/) Extension for adding Amazon Assoicate Widgets to your Wiki.

## Requirements

* Mediawiki 1.27+

## Installation

Download the extension and add it to your extensions folder, or install it by adding it to your ```composer.local.json``` file:

```
{
    "require": {
        "multidimensional/amazonwidget": "*"
    }
}
```

Activate the extension in ```LocalSettings.php``` and set your phpBB directory location.

```php
wfLoadExtension( 'Amazonwidget' );
```

That's it!

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
