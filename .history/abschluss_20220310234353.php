<?php

session_start();

$produkte = require('core/produkte.php');
$einstellungen = require('core/einstellungen.php');

if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $einstellungen['firma'] ?> Bestellbestätigung</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col gap-8 py-16 mx-auto max-w-7xl">
        <section>
            <h1 class="text-4xl">Warenkorb</h1>
            <p>Hier siehst du, was aktuell in deinem Warenkorb liegt</p>
            <?php if (!isset($_SESSION['user'])) echo '<p>Um die Bestellung abzuschließen, musst du dich erst <a class="underline text-honeygreen" href="login.php">hier einloggen.</a></p>'; ?>

        </section>
    </main>
</body>

</html>