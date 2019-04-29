<?php
error_reporting(E_ALL);
session_start();
define("USER", "root");
define("PASSWORD", "");
define("DB", "educations");
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("URL", $_SERVER['REQUEST_URI']);
define("HOST", "localhost");
define("PATH_TPL", "/app/template/");
?>