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
            <h1 class="text-4xl">Vielen Dank für deine Bestellung <?= $_SESSION['user']['vorname'] ?>!</h1>
            <p>Wir bei <?= $einstellungen['firma'] ?> sind dir sehr dankbar dass du uns hilfst ökologisch wertvolle Arbeit mit Bienen zu betreiben! Bitte beehren Sie uns als bald wieder.</p>
        </section>
        <section class="bg-gray-200 p-6">
            <h3 class="text-2xl">Deine Bestellung:</h3>
        </section>
    </main>
</body>

</html>