<?php

session_start();

unset($_SESSION['user']);

if (isset($_GET['to'])) {
    unset()
} else {
    header('Location: login.php');
}
