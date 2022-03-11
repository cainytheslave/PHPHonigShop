<?php

session_start();

$produkte = require('core/produkte.php');
$einstellungen = require('core/einstellungen.php');

if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
}

if (isset($_POST['clear'])) {
    $_SESSION['warenkorb'] = [];
}

foreach ($produkte as $id => $produkt) {
    if (isset($_POST[$id])) {
        switch ($_POST[$id]) {
            case 'Entfernen':
                unset($_SESSION['warenkorb'][$id]);
                break;
            case 'Ändern':
                if (isset($_POST['count'])) {
                    $anzahl = intval($_POST['count']);
                    if ($anzahl <= 0) {
                        unset($_SESSION['warenkorb'][$id]);
                    } else {
                        $_SESSION['warenkorb'][$id] = $anzahl;
                    }
                } else {
                    $errors = ['Keine Anzahl definiert.'];
                    break;
                }
        }

        header('Location: warenkorb.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $einstellungen['firma'] ?> Warenkorb</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col gap-8 py-16 mx-auto max-w-7xl">
    </main>
</body>

</html>