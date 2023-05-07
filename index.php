<?php

use Framework\Request;
use Framework\Router;
use Framework\Application;

date_default_timezone_set('Asia/Yekaterinburg');
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

//$request = new Request();
//Application::init();
//echo (new Router($request))->getContent();


//exit();

require "dbconnect.php";
require "auth.php";
require "menu.php";
if (isset($_SESSION['login'])) {
    require "matches.php";
} else {
    echo '<img class="Messi" src="assets/MESSI.jpg" width="100%" height="100%" />';
    //echo 'Войдите в сиситему для просмотра и создания событий';
}
require "msg.php";
$_SESSION['msg'] = '';
