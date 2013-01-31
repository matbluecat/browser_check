<?php
/**
 * モバイル向けブラウザチェック
 * 確認用スクリプト
 */
require 'browser_check.php';

$user_agent_list = array(
	// 標準ブラウザ
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (Linux; U; Android 4.0.3; ja-jp; ISW13F Build/V69R51I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
	),

	// Chrome
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (Linux; Android 4.0.3; ISW13F Build/V69R51I) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Mobile Safari/535.19',
	),

	// OperaMini
	array(
		'HTTP_USER_AGENT' => 'Opera/9.80 (Android; Opera Mini/7.5.32193/28.3590; U; ja) Presto/2.8.119 Version/11.10',
		'HTTP_X_OPERAMINI_PHONE_UA' => 'Mozilla/5.0 (Linux; U; Android 4.0.3; ja-jp; ISW13F Build/V69R51I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
	),

	// OperaMobile
	array(
		'HTTP_USER_AGENT' => 'Opera/9.80 (Android 4.0.3; Linux; Opera Mobi/ADR-1301080958) Presto/2.11.355 Version/12.10',
		'HTTP_DEVICE_STOCK_UA' => 'Mozilla/5.0 (Linux; U; Android 4.0.3; ja-jp; ISW13F Build/V69R51I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
	),

	// Firefox
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (Android; Mobile; rv:18.0) Gecko/18.0 Firefox/18.0',
	),

	// DolphinBrowser
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (Linux; U; Android 4.0.3; ja-jp; ISW13F Build/V69R51I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
	),

	// iLunascape
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (Linux; U; Android 4.0.3; ja-jp; ISW13F Build/V69R51I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 iLunascape/2.1.0.0',
	),

	// Sleipnir
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (Linux; U; Android 4.0.3; ja-jp; ISW13F Build/V69R51I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
	),

	// jigBrowser
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (Linux; U; Android 4.0.3; ja-jp; ISW13F Build/V69R51I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
	),

	// AngelBrowser
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (Linux; U; Android 4.0.3; ja-jp; ISW13F Build/V69R51I) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
	),
);

$bc = new BrowserCheck();

foreach($user_agent_list as $key => $val){
	var_dump($bc->check($val));
}
