<?php
/**
 * モバイル向けブラウザチェック
 */

class BrowserCheck
{
	public $os = '';
	public $os_version = '';
	public $kind = '';

	private static $_os_class_list = array(
		'Android'	=> 'BrowserInfoAndroid',
		'iPhone'	=> 'BrowserInfoIos',
		'iPad'		=> 'BrowserInfoIos',
		'iPod'		=> 'BrowserInfoIos',
	);

	public static function getInfo($server=null){
		$server = (is_array($server)) ? $server : $_SERVER;
		if($server['HTTP_USER_AGENT']!=''){
			$class_name = false;
			foreach(self::$_os_class_list as $os => $name){
				if(strstr($server['HTTP_USER_AGENT'], $os)){
					$class_name = $name;
					break;
				}
			}
			if($class_name!==false){
				var_dump($class_name);
				return new $class_name($server);
			}
		}
		return false;
	}
}

class BrowserInfoBase
{
	public function __construct($server=null){
		if(is_array($server)){
			$this->extractKindVersion($server);
		}
	}
}

class BrowserInfoAndroid extends BrowserInfoBase
{
	public $os = 'Android';
	public function extractKindVersion($server){
		if(strstr($server['HTTP_USER_AGENT'], 'Opera Mini')){
			// Opera Mini
			$_user_agent = $server['HTTP_X_OPERAMINI_PHONE_UA'];
		}else if(strstr($server['HTTP_USER_AGENT'], 'Opera Mobi')){
			// Opera Mobile
			$_user_agent = $server['HTTP_DEVICE_STOCK_UA'];
		}else if(strstr($server['HTTP_USER_AGENT'], 'Firefox')){
			// Firefox
			return 'Firefox';
		}else{
			// Default Browser
			$_user_agent = $server['HTTP_USER_AGENT'];
		}
		preg_match('/(\(.*?\))/', $_user_agent, $matches);
		if($matches[1]!=''){
			$_tmp = explode(';', trim($matches[1], '()'));
			// OSのバージョン取得
			foreach($_tmp as $key => $val){
				if(strstr($val, 'Android')!==false){
					$_version_tmp = explode(' ', $val);
					$this->os_version = trim(end($_version_tmp));
				}
			}
			// 機種名取得
			$_kind_tmp = trim(end($_tmp));
			$_kind_tmp_array = explode(' ', $_kind_tmp);
			$this->kind = trim($_kind_tmp_array[0]);
			$_ret_val = trim(end($_tmp));
		}
		$this->os = 'Android';
		var_dump($_tmp);
	}
}

class BrowserInfoIos extends BrowserInfoBase
{
	public $os = 'iOS';
	public function extractKindVersion($server){
		preg_match('/\((.*?);/', $server['HTTP_USER_AGENT'], $matches);
		$this->kind = $matches[1];
		preg_match('/OS (.*?) like/', $server['HTTP_USER_AGENT'], $matches);
		$this->os_version = trim(str_replace('_', '.', $matches[1]));
	}
}

