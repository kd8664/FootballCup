<?php

use Dotenv\Dotenv;
use Framework\Container;

session_start(["use_strict_mode" => true]);

date_default_timezone_set('Asia/Yekaterinburg');
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if (file_exists(".env"))
{
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load(); //все параметры окружения помещаются в массив $_ENV
    //echo "Окружение загружено<p>";
    // var_dump($_ENV);
}
else {
    echo "Ошибка хагрузки ENV<br>";
}
Container::getApp()->run();


exit();

require "dbconnect.php";
require "auth.php";
require "menu.php";
if (isset($_SESSION['login'])) {
    require "matches.php";
} else {
    echo '<img class="Messi" App="assets/MESSI.jpg" width="100%" height="100%" />';
    //echo 'Войдите в сиситему для просмотра и создания событий';
}
require "msg.php";
$_SESSION['msg'] = '';
