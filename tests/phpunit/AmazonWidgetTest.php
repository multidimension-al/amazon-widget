<?php
/**
 *         __  ___      ____  _     ___                           _                    __
 *        /  |/  /_  __/ / /_(_)___/ (_)___ ___  ___  ____  _____(_)___  ____   ____ _/ /
 *       / /|_/ / / / / / __/ / __  / / __ `__ \/ _ \/ __ \/ ___/ / __ \/ __ \ / __ `/ /
 *      / /  / / /_/ / / /_/ / /_/ / / / / / / /  __/ / / (__  ) / /_/ / / / // /_/ / /
 *     /_/  /_/\__,_/_/\__/_/\__,_/_/_/ /_/ /_/\___/_/ /_/____/_/\____/_/ /_(_)__,_/_/
 *
 *    Amazon Associates Widget: MediaWiki Extension
 *    Copyright (c) Multidimension.al (http://multidimension.al)
 *    Github : https://github.com/multidimension-al/amazon-widget
 *
 *    Licensed under The MIT License
 *    For full copyright and license information, please see the LICENSE file
 *    Redistributions of files must retain the above copyright notice.
 *
 *    @copyright  Copyright © 2019 - 2019 Multidimension.al (http://multidimension.al)
 *    @link       https://github.com/multidimension-al/amazon-widget Github
 *    @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */

use MediaWiki\MediaWikiServices;

class AmazonWidgetTest extends MediaWikiTestCase
{
    protected function setUp()
    {
        parent::setUp();

        global $wgAmazonWidgetTag, $wgAmazonWidgetRegion, $wgAmazonWidgetWidth, $wgAmazonWidgetHeight;
        global $wgAmazonWidgetBackground, $wgAmazonWidgetBorder, $wgAmazonWidgetPriceColor;
        global $wgAmazonWidgetTitleColor, $wgAmazonWidgetNewWindow, $wgAmazonWidgetMarketplace;

        $wgAmazonWidgetTag = 'media-wiki-20';
        $wgAmazonWidgetRegion = 'US';
        $wgAmazonWidgetWidth = 120;
        $wgAmazonWidgetHeight = 240;
        $wgAmazonWidgetBackground = 'ffffff';
        $wgAmazonWidgetBorder = true;
        $wgAmazonWidgetPriceColor = '333333';
        $wgAmazonWidgetTitleColor = '0066c0';
        $wgAmazonWidgetNewWindow = false;
        $wgAmazonWidgetMarketplace = 'amazon';
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function renderTag($asin, $id, $style = '', $width = 120, $height = 240)
    {
        global $wgAmazonWidgetTag, $wgAmazonWidgetRegion, $wgAmazonWidgetWidth, $wgAmazonWidgetHeight;
        global $wgAmazonWidgetBackground, $wgAmazonWidgetBorder, $wgAmazonWidgetPriceColor;
        global $wgAmazonWidgetTitleColor, $wgAmazonWidgetNewWindow, $wgAmazonWidgetMarketplace;

        $parser = MediaWikiServices::getInstance()->getParserFactory()->create();
        $parser->setHook('amazon', 'Multidimensional\AmazonWidget\AmazonWidget::render');

        $parserOutput = $parser->parse(
            "<amazon asin='" . $asin . "' id='" . $id . "' style='" . $style . "' width='" . $width . "' height='" . $height . "' />",
            Title::newFromText('Test'),
            $this->getParserOptions()
        );

        $this->assertContains('<iframe style="' . $style . 'width:' . $wgAmazonWidgetWidth . ';height:' . $wgAmazonWidgetHeight . ';" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&amp;OneJS=1&amp;Operation=GetAdHtml&amp;MarketPlace=' . $wgAmazonWidgetRegion . '&amp;source=ac&amp;ref=tf_til&amp;ad_type=product_link&amp;tracking_id=' . $wgAmazonWidgetTag . '&amp;marketplace=' . $wgAmazonWidgetMarketplace . '&amp;region=' . $wgAmazonWidgetRegion . '&amp;placement=B00005N5PF&amp;asins=B00005N5PF&amp;id=123&amp;show_border=' . ($wgAmazonWidgetBorder ? 'true' : 'false') . '&amp;link_opens_in_new_window=' . ($wgAmazonWidgetNewWindow ? 'true' : 'false') . '&amp;price_color=' . $wgAmazonWidgetPriceColor . '&amp;title_color=' . $wgAmazonWidgetTitleColor . '&amp;bg_color=' . $wgAmazonWidgetBackground . '"></iframe>', $parserOutput->getText(['unwrap' => true]));
        $parser->mPreprocessor = null; # Break the Parser <-> Preprocessor cycle
    }

    private function getParserOptions()
    {
        return ParserOptions::newFromUserAndLang(new User, MediaWikiServices::getInstance()->getContentLanguage());
    }

    public function testRenders()
    {
        $this->renderTag('B00005N5PF', '123');
        $this->renderTag('B00005N5PF', '123', 'float:right;');
        global $wgAmazonWidgetWidth, $wgAmazonWidgetHeight;
        $wgAmazonWidgetWidth = 100;
        $wgAmazonWidgetHeight = 150;
        $this->renderTag('B00005N5PF', '123', 'float:right;', 100, 150);
    }
}
