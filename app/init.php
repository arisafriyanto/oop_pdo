<?php

session_start();

spl_autoload_register(function ($class) {
    require_once "app/classes/" . $class . ".php";
});

$user = new User();

require_once "app/template/header.php";
require_once "app/template/footer.php";
