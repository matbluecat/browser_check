<?php
/**
 * モバイル向けブラウザチェック
 * USER AGENTから機種情報とかOSのバージョンをとってくる
 */

class BrowserInfoFactory
{

	public static function getInfo($server=null){
		$server = (is_array($server)) ? $server : $_SERVER;
		$_class_list = array(
			'BrowserInfoDocomo',
			'BrowserInfoAu',
			'BrowserInfoSoftbank',
			'BrowserInfoAndroid',
			'BrowserInfoIos',
		);
		if(self::isMobile($server)){
			foreach($_class_list as $_class_name){
				if($_class_name::is($server)){
					return new $_class_name($server);
				}
			}
		}
		
	}

	public static function isMobile($server){
		return true;
	}

}

abstract class BrowserInfoBase
{
	public $os = '';
	public $os_version = '';
	public $carrier = '';
	public $kind = '';

	protected $server = null;
	public function __construct($server=null){
		if(is_array($server)){
			$this->server = $server;
			$this->extractKindVersion($server);
		}
	}
}

class BrowserInfoAndroid extends BrowserInfoBase
{
	public $os = 'Android';
	public static function is($server=null){
		if(strpos($server['HTTP_USER_AGENT'], 'Android')!==false){
			return true;
		}
	}
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
	}
}

class BrowserInfoIos extends BrowserInfoBase
{
	public $os = 'iOS';
	public static function is($server=null){
		if(strpos($server['HTTP_USER_AGENT'], 'iPhone')!==false || strpos($server['HTTP_USER_AGENT'], 'iPad')!==false || strpos($server['HTTP_USER_AGENT'], 'iPod')!==false){
			return true;
		}
	}
	public function extractKindVersion($server){
		preg_match('/\((.*?);/', $server['HTTP_USER_AGENT'], $matches);
		$this->kind = $matches[1];
		preg_match('/OS (.*?) like/', $server['HTTP_USER_AGENT'], $matches);
		$this->os_version = trim(str_replace('_', '.', $matches[1]));
	}
}

class BrowserInfoDocomo extends BrowserInfoBase
{
	public $os = 'docomo';
	public static function is($server=null){
		if(strpos($server['HTTP_USER_AGENT'], 'DoCoMo')!==false){
			return true;
		}
	}
	public function extractKindVersion($server){
	}
}

class BrowserInfoAu extends BrowserInfoBase
{
	public $os = 'au';
	public static function is($server=null){
		if(strpos($server['HTTP_USER_AGENT'], 'KDDI-')!==false || strpos($server['HTTP_USER_AGENT'], 'UP.Browser')!==false){
			return true;
		}
	}
	public function extractKindVersion($server){
	}
}

class BrowserInfoSoftbank extends BrowserInfoBase
{
	public $os = 'SoftBank';
	public static function is($server=null){
		if(strpos($server['HTTP_USER_AGENT'], 'J-PHONE')!==false || strpos($server['HTTP_USER_AGENT'], 'Vodafone')!==false || strpos($server['HTTP_USER_AGENT'], 'MOT-')!==false || strpos($server['HTTP_USER_AGENT'], 'SoftBank')!==false){
			return true;
		}
	}
	public function extractKindVersion($server){
	}
}

