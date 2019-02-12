<?php
/**
 *       __  ___      ____  _     ___                           _                    __
 *      /  |/  /_  __/ / /_(_)___/ (_)___ ___  ___  ____  _____(_)___  ____   ____ _/ /
 *     / /|_/ / / / / / __/ / __  / / __ `__ \/ _ \/ __ \/ ___/ / __ \/ __ \ / __ `/ /
 *    / /  / / /_/ / / /_/ / /_/ / / / / / / /  __/ / / (__  ) / /_/ / / / // /_/ / /
 *   /_/  /_/\__,_/_/\__/_/\__,_/_/_/ /_/ /_/\___/_/ /_/____/_/\____/_/ /_(_)__,_/_/
 *
 *  Amazon Associates Widget: MediaWiki Extension
 *  Copyright (c) Multidimension.al (http://multidimension.al)
 *  Github : https://github.com/multidimension-al/amazon-widget
 *
 *  Licensed under The MIT License
 *  For full copyright and license information, please see the LICENSE file
 *  Redistributions of files must retain the above copyright notice.
 *
 *  @copyright  Copyright © 2019 Multidimension.al (http://multidimension.al)
 *  @link       https://github.com/multidimension-al/amazon-widget Github
 *  @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Multidimensional\AmazonWidget;

use Parser;
use PPFrame;

class AmazonWidget {

    /**
     * @suppress SecurityCheck-DoubleEscaped
     */
    static function render($input, array $ARGS, Parser $parser, PPFrame $frame)
    {

        global $wgAmazonWidgetTag, $wgAmazonWidgetRegion, $wgAmazonWidgetWidth, $wgAmazonWidgetHeight;
        global $wgAmazonWidgetBackground, $wgAmazonWidgetBorder, $wgAmazonWidgetPriceColor;
        global $wgAmazonWidgetTitleColor, $wgAmazonWidgetNewWindow;

        //These can be set through the Amazon tag.
        if ( array_key_exists( 'asin', $ARGS ) ) {
            $wgAmazonWidgetAsin = $ARGS['asin'];
        }

        if ( array_key_exists( 'id', $ARGS ) ) {
            $wgAmazonWidgetId = $ARGS['id'];
        }

        if ( array_key_exists( 'style', $ARGS ) ) {
            $wgAmazonWidgetStyle = $ARGS['style'];
        }

        if (array_key_exists('width', $ARGS)) {
            $wgAmazonWidgetWidth = $ARGS['width'];
        }

        if (array_key_exists('height', $ARGS)) {
            $wgAmazonWidgetHeight = $ARGS['height'];
        }

        if (empty($wgAmazonWidgetTag)) {
            $wgAmazonWidgetTag = 'media-wiki-20';
        }

        if (empty($wgAmazonWidgetRegion)) {
            $wgAmazonWidgetRegion = 'US';
        }

        if (!isset($wgAmazonWidgetBorder)) {
            $wgAmazonWidgetBorder = true;
        }

        if (!isset($wgAmazonWidgetNewWindow)) {
            $wgAmazonWidgetNewWindow = false;
        }

        if (strpos($wgAmazonWidgetWidth, "%") !== false) {
            $wgAmazonWidgetWidth = preg_replace('/[^\d.\%]/i', '', $wgAmazonWidgetWidth);
        } elseif (strpos($wgAmazonWidgetWidth, "px") !== false) {
            $wgAmazonWidgetWidth = preg_replace('/[^\d.px]/i', '', $wgAmazonWidgetWidth);
        } elseif (!empty($wgAmazonWidgetWidth)) {
            $wgAmazonWidgetWidth = preg_replace('/[^\d.]/i', '', $wgAmazonWidgetWidth) . 'px';
        } else {
            $wgAmazonWidgetWidth = '120px';
        }

        if (strpos($wgAmazonWidgetHeight, "%") !== false) {
            $wgAmazonWidgetHeight = preg_replace('/[^\d.\%]/i', '', $wgAmazonWidgetHeight);
        } elseif (strpos($wgAmazonWidgetHeight, "px") !== false) {
            $wgAmazonWidgetHeight = preg_replace('/[^\d.px]/i', '', $wgAmazonWidgetHeight);
        } elseif (!empty($wgAmazonWidgetHeight)) {
            $wgAmazonWidgetHeight = preg_replace('/[^\d.]/i', '', $wgAmazonWidgetHeight) . 'px';
        } else {
            $wgAmazonWidgetHeight = '240px';
        }

        if (!empty($wgAmazonWidgetStyle) && substr(trim($wgAmazonWidgetStyle), -1, 1) !== ';') {
            $wgAmazonWidgetStyle = trim($wgAmazonWidgetStyle) . ';';
        }

        if (!preg_match('/width:([^;])+/i', $wgAmazonWidgetStyle)) {
            $wgAmazonWidgetStyle .= 'width:' . $wgAmazonWidgetWidth . ';';
        }

        if (!preg_match('/height:([^;])+/i', $wgAmazonWidgetStyle)) {
            $wgAmazonWidgetStyle .= 'height:' . $wgAmazonWidgetHeight . ';';
        }

        if (!preg_match('/^(?:[0-9A-F]{3}|[0-9A-F]{6})$/i', $wgAmazonWidgetBackground)) {
            $wgAmazonWidgetBackground = 'ffffff';
        }

        if (!preg_match('/^(?:[0-9A-F]{3}|[0-9A-F]{6})$/i', $wgAmazonWidgetTitleColor)) {
            $wgAmazonWidgetTitleColor = '0066c0';
        }

        if (!preg_match('/^(?:[0-9A-F]{3}|[0-9A-F]{6})$/i', $wgAmazonWidgetPriceColor)) {
            $wgAmazonWidgetPriceColor = '333333';
        }

        if (!empty($wgAmazonWidgetAsin) && preg_match('/([A-Z0-9]{10})/is', $wgAmazonWidgetAsin) && !empty($wgAmazonWidgetId)) {

            $widget = '<iframe style="' . $wgAmazonWidgetStyle . '" ';
            $widget .= 'marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="';
            $widget .= '//ws-na.amazon-adsystem.com/widgets/q';
            $widget .= '?ServiceVersion=20070822';
            $widget .= '&OneJS=1';
            $widget .= '&Operation=GetAdHtml';
            $widget .= '&MarketPlace=' . $wgAmazonWidgetRegion;
            $widget .= '&source=ac';
            $widget .= '&ref=tf_til';
            $widget .= '&ad_type=product_link';
            $widget .= '&tracking_id=' . $wgAmazonWidgetTag;
            $widget .= '&marketplace=amazon';
            $widget .= '&region=' . $wgAmazonWidgetRegion;
            $widget .= '&placement=' . $wgAmazonWidgetAsin;
            $widget .= '&asins=' . $wgAmazonWidgetAsin;
            $widget .= '&id=' . $wgAmazonWidgetId;
            $widget .= '&show_border=' . ($wgAmazonWidgetBorder ? 'true' : 'false');
            $widget .= '&link_opens_in_new_window=' . ($wgAmazonWidgetNewWindow ? 'true' : 'false');
            $widget .= '&price_color=' . $wgAmazonWidgetPriceColor;
            $widget .= '&title_color=' . $wgAmazonWidgetTitleColor;
            $widget .= '&bg_color=' . $wgAmazonWidgetBackground;
            $widget .= '"></iframe>';

        } else {
            $widget = '';
        }

        return array($widget, "markerType" => 'nowiki');
    }
}
