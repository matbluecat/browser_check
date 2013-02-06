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

	// iPhone Safari
	// OS 3.0
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7A341 Safari/528.16',
	),
	// OS 4.0
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7',
	),
	// OS 4.0.2
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0_2 like Mac OS X; ja-jp) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A400 Safari/6531.22.7',
	),
	// OS 4.1
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_1 like Mac OS X; ja-jp) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8B117 Safari/6531.22.7',
	),
	// OS 4.2.1
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_2_1 like Mac OS X; ja-jp) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8C148a Safari/6533.18.5',
	),
	// OS 5.0.1
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_0_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A405 Safari/7534.48.3',
	),
	// OS 5.1
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9B179 Safari/7534.48.3',
	),
	// OS 6.0
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A403 Safari/8536.25',
	),
	// iPad Safari
	// OS 3.2
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; ja-jp) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B367 Safari/531.21.10',
	),
	// OS 3.2.2
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPad; U; CPU OS 3_2_2 like Mac OS X; ja-jp) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B500 Safari/531.21.10',
	),
	// OS 4.2.1
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPad; U; CPU OS 4_2_1 like Mac OS X; ja-jp) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8C148 Safari/6533.18.5',
	),
	// OS 5.0.1
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPad; CPU OS 5_0_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A405 Safari/7534.48.3',
	),
	// OS 5.1
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPad; CPU OS 5_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9B176 Safari/7534.48.3',
	),
	// OS 6.0
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A403 Safari/8536.25',
	),
	// iPod Safari
	array(
		'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPod; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7A341 Safari/528.16',
	),
);

foreach($user_agent_list as $key => $val){
	$bi = BrowserInfoFactory::getInfo($val);
	var_dump(
	$bi
	);
}
