<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!$_SESSION['id']) {
    $value = "Login is needed to access any internal content";
    header("location: index.php?value={$value}");
    die();
}
