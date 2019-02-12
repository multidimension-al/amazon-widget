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

class AmazonWidgetHooks
{

    /**
     * @param Parser $parser
     * @return bool
     */
    static function onParserFirstCallInit(Parser &$parser)
    {
        $parser->setHook('amazon', 'Multidimensional\AmazonWidget\AmazonWidget::render');
        return true;
    }

}