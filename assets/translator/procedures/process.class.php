<?php
/**
 * Translator Revolution WP Plugin
 * http://goo.gl/1kVfu
 *
 * LICENSE
 *
 * You need to buy a license if you want use this script.
 * http://codecanyon.net/legal/membership/
 *
 * @package    Translator Revolution Lite
 * @copyright  Copyright (c) SurStudio, www.surstudio.net
 * @license    http://codecanyon.net/licenses/regular_extended/
 * @version    2.0
 * @date       2019-04-01
 */

require_once dirname(__FILE__) . '/../classes/common.class.php';

class SurStudioPluginTranslatorRevolutionLiteProcessManage {
	
	public static function main() {

		$action = SurStudioPluginTranslatorRevolutionLiteCommon::getVariable('action');

		switch ($action) {
			case 'token':
				self::_token();
				break;
			case 'translate':
				self::_translate();
				break;
		}

	}

	protected static function _token() {

		require_once dirname(__FILE__) . '/token.class.php';

	}

	protected static function _translate() {

		require_once dirname(__FILE__) . '/translate.class.php';

	}

}

SurStudioPluginTranslatorRevolutionLiteProcessManage::main();