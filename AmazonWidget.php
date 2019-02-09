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

use MediaWiki\MediaWikiServices;
use Parser;
use PPFrame;

class AmazonWidget {

	/**
	 * @suppress SecurityCheck-DoubleEscaped
	 */
	static function render( $input, array $ARGS, Parser $parser, PPFrame $frame ) {

        $config = MediaWikiServices::getInstance()->getConfigFactory()->makeConfig( 'AmazonWidget' );

        $width = $config->get( 'width' );
        $height = $config->get( 'height' );
        $tag = $config->get( 'tag' );
        //pricecolor
        //titlecolor
        $background = $config->get( 'background' );
        //openinnewwindow
        $region = $config->get( 'region' );
        $border = $config->get( 'border' );

        if ( array_key_exists( 'asin', $ARGS ) ) {
            $asin = $ARGS['asin'];
        }

        if ( array_key_exists( 'id', $ARGS ) ) {
            $id = $ARGS['id'];
        }

        if ( array_key_exists( 'style', $ARGS ) ) {
            $style = $ARGS['style'];
        }

        //Do various regex and other filtering and validation

        if(isset($asin) && preg_match('/([A-Z0-9]{10})/is', $asin)) {

            $widget = '<iframe
              style="'.$style.'"
              marginwidth="0"
              marginheight="0"
              scrolling="no"
              frameborder="0
              src="//ws-na.amazon-adsystem.com/widgets/q
                ?ServiceVersion=20070822
                &OneJS=1
                &Operation=GetAdHtml
                &MarketPlace='.$region.'
                &source=ac
                &ref=tf_til
                &ad_type=product_link
                &tracking_id='.$tag.'
                &marketplace=amazon
                &region='.$region.'
                &placement='.$asin.'
                &asins='.$asin.'
                &id='.$id.'
                &show_border=true
                &link_opens_in_new_window=false
                &price_color=333333
                &title_color=0066c0
                &bg_color=ffffff">
                </iframe>';

        } else {
            $widget = '';
        }

		return $parser->recursiveTagParse( $widget );
	}
}
