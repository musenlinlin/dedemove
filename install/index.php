<?php
set_time_limit(0);

error_reporting(E_ALL ||  ~E_NOTICE);

$verMsg = 'heyi 1.0';
$s_lang = 'utf-8';
$dfDbname = 'heyihou';
$errmsg = '';
define('INSTALL_DEMO_NAME', 'heyi,txt');
define('INSLOCKFILE', dirname(__FILE__).'/install_lock.txt');
$moduleCacheFile = dirname(__FILE__).'/modules.tmp.inc';
define('DEDEINC', dirname(__FILE__).'/../include');
define('DEDEDATA', dirname(__FILE__).'/../data');
define('DEDEROOT', preg_replace("#[\\\\\/]install#", '', dirname(__FILE__)));
header("Content-Type: text/html; charset={$s_lang}");

require_once(DEDEROOT.'/install/install.inc.php');
require_once(DEDEINC.'/zip.class.php');

foreach (Array('_GET', '_POST','_COOKIE') as $_request ) {
    foreach ($$_request as $_k => $_v) {
        ${$_k} = RunMagicQuotes($_v);
    }
}