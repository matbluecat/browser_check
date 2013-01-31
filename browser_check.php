<?php
/**
 * モバイル向けブラウザチェック
 */

class BrowserCheck
{
	public function check($_server=null){
		$_server = (is_array($_server)) ? $_server : $_SERVER;
		$_kind = $this->extractKind($_server);
		return $_kind;
	}

	/**
	 * HTTP_USER_AGENT から 機種情報を抜き出してくる
	 */
	public function extractKind($_server){
		$_ret_val = false;
		if($_server['HTTP_USER_AGENT']!=''){
			if(strstr($_server['HTTP_USER_AGENT'], 'Android')){
				if(strstr($_server['HTTP_USER_AGENT'], 'Opera Mini')){
					// Opera Mini
					$_user_agent = $_server['HTTP_X_OPERAMINI_PHONE_UA'];
				}else if(strstr($_server['HTTP_USER_AGENT'], 'Opera Mobi')){
					// Opera Mobile
					$_user_agent = $_server['HTTP_DEVICE_STOCK_UA'];
				}else if(strstr($_server['HTTP_USER_AGENT'], 'Firefox')){
					// Firefox
					return 'Firefox';
				}else{
					// Default Browser
					$_user_agent = $_server['HTTP_USER_AGENT'];
				}
				preg_match('/(\(.*?\))/', $_user_agent, $matches);
				if($matches[1]!=''){
// TODO ついでにバージョン情報も抜き出したい
					$_tmp = explode(';', trim($matches[1], '()'));
					$_ret_val = trim(end($_tmp));
				}
				var_dump($_tmp);
			}
		}

		return $_ret_val;
	}
}

