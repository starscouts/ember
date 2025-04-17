<?php

if (isset(array_keys($_GET)[0])) {
    require_once "view.php";
} else {
    require_once "home.php";
}