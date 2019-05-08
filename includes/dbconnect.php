<?php

//header('Content-Type: text/html; charset=utf-8');

$server = "localhost";
$username = "root";
$password = "";
$database = "hd";

	$mysqli = new mysqli($server, $username, $password, $database);


if($mysqli->connect_error){
    /**
     * Я бы не выводил ошибку по соображениям безопасности,
     * самый простой вариант просто ошибку писать файл
     * в linux системах - в папку /var/log принято писать
     * обычно не умирают а выкидывают исключения которые возможно что-то ниже перехватит
     * @see https://www.php.net/manual/ru/language.exceptions.php
     */
	die("<p>Ошибка подключения к БД.</p><p>Код ошибки: ".$mysqli->connect_errno."</p><p>Описание ошибки: ".$mysqli->connect_error."</p>");
}

$mysqli->set_charset('utf8');

$address_site = "http://localhost";
/**
 * Эти две функции не логичны здесь,
 * обычно это в классе (в файле в твоем случае) находятся в UrlHelper
 */

function message_send($messages){
	$_SESSION["serever_messages"] = $messages;
}
function redirect_to($message, $address_page){

	$_SESSION["serever_message"] = $message;

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".$address_site."/".$address_page);

	exit();
}