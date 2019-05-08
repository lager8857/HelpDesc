<?php

session_start();
/**
 * Зачем? после session_destroy они сами удалятся
 */
unset($_SESSION['email']);
unset($_SESSION['password']);
session_destroy();

header("HTTP/1.1 301 Moved Permanently");
header("Location: " . $_SERVER["HTTP_REFERER"]);

?>