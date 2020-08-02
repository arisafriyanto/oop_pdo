<?php

require_once "app/init.php";

if (!Session::exist('username')) {
    header("location: login.php");
} else {
    header("location: home.php");
}
