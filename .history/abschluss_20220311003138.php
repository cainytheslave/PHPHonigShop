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
            <?php foreach ($_SESSION['warenkorb'] as $sorte => $anzahl) : ?>
                <div class="flex items-center gap-3 my-3 bg-gray-200 py-3 px-3">
                    <img src="images/<?= $sorte ?>.png" class="w-24 h-24" alt="">
                    <div class="w-full">
                        <h2 class="text-xl mb-3"><?= $produkte[$sorte]['name'] ?></h2>
                        <span class="flex flex-col sm:flex-row items-center w-full justify-between gap-3">
                            <form action="" method="POST">
                                Menge: <input type="number" class="px-3 py-2 border-green-500 border-2" name="count" value="<?= $anzahl ?>">
                                <input type="submit" class="px-3 py-2 border-green-500 border-2" name="<?= $sorte ?>" value="Ändern">
                            </form>
                            <form action="" method="POST">
                                <input type="submit" class="px-3 py-2 border-red-500 border-2" name="<?= $sorte ?>" value="Entfernen">
                            </form>
                            <div class="flex items-center grow justify-end">
                                <p class="text-xl bg-white px-3 py-2">CHF <?= sprintf('%.2f', $produkte[$sorte]['preis'] * $anzahl) ?></p>
                            </div>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>