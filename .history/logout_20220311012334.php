<?php

session_start();

if (isset($_GET['to'])) {
} else {
    unset($_SESSION['user']);
    header('Location: login.php');
}
