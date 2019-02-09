<?php

namespace Multidimensional\AmazonWidget;

class AmazonWidget {

	static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
		$out->addModules( 'ext.AmazonWidget' );
		return true;
	}

	static function onParserFirstCallInit( Parser &$parser ) {
		$parser->setHook( 'AmazonWidget', 'AmazonWidget::render' );
		return true;
	}

	/**
	 * @suppress SecurityCheck-DoubleEscaped
	 */
	static function render( $input, array $ARGS, Parser $parser, PPFrame $frame ) {

/*
<iframe
  style="width:120px;height:240px;"
  marginwidth="0"
  marginheight="0"
  scrolling="no"
  frameborder="0
  src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ac&ref=tf_til&ad_type=product_link&tracking_id=09-87-54-87-20&marketplace=amazon&region=US&placement=B07N7RXQF6&asins=B07N7RXQF6&linkId=bf8e52681436765a879c1dc730fc6018&show_border=true&link_opens_in_new_window=false&price_color=333333&title_color=0066c0&bg_color=ffffff">
    </iframe>
    */

		return $parser->recursiveTagParse(  );
	}
}
