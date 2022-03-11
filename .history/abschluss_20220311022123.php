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
        <section class="p-6 bg-gray-200">
            <h3 class="text-2xl">Deine Bestellung:</h3>
            <?php foreach ($_SESSION['warenkorb'] as $sorte => $anzahl) : ?>
                <div class="flex items-center gap-3 px-3 py-3 my-3 bg-gray-200">
                    <img src="images/<?= $sorte ?>.png" class="w-24 h-24" alt="">
                    <div class="w-full">
                        <h2 class="mb-3 text-xl"><?= $anzahl ?>x <?= $produkte[$sorte]['name'] ?></h2>
                        <span class="flex flex-col items-center justify-between w-full gap-3 sm:flex-row">
                            <div class="flex items-center justify-end grow">
                                <p class="px-3 py-2 text-xl bg-white">CHF <?= sprintf('%.2f', $produkte[$sorte]['preis'] * $anzahl) ?></p>
                            </div>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>