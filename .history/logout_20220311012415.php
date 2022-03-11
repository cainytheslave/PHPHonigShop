<?php

session_start();

unset($_SESSION['user']);

if (isset($_GET['to'])) {
    header('Location: ' . $_GET['to']);
} else {
    header('Location: login.php');
}
