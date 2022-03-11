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

    <main class="flex flex-col gap-8 px-6 py-16 mx-auto max-w-7xl">
        <?php if (isset($errors) && count($errors) > 0) : ?>
            <section class="w-full p-4 mx-auto bg-red-300 border-2 border-red-500 rounded-md shadow-xl">
                <?php foreach ($errors as $error) : ?>
                    <p class="text-lg font-semibold">Error: <?= $error ?></p>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <section>
            <h1 class="text-4xl">Warenkorb</h1>
            <p>Hier siehst du, was aktuell in deinem Warenkorb liegt</p>
            <?php if (!isset($_SESSION['user'])) echo '<p>Um die Bestellung abzuschließen, musst du dich erst <a class="underline text-honeygreen" href="login.php">hier einloggen.</a></p>'; ?>

        </section>

        <section class="w-full p-4 mx-auto bg-white rounded-md shadow-xl">
            <div class="flex flex-col px-8 py-8 mt-4 border-4">
                <?php if (empty($_SESSION['warenkorb'])) : ?>
                    <span class="">
                        <p class="mb-4">Dein Warenkorb ist noch leer!</p>
                        <a href="shop.php" class="px-3 py-2 border-2 rounded border-honey">Zum Shop</a>
                    </span>
                <?php else : ?>
                    <?php foreach ($_SESSION['warenkorb'] as $sorte => $anzahl) : ?>
                        <div class="flex items-center gap-3 px-3 py-3 my-3 bg-gray-200">
                            <img src="images/<?= $sorte ?>.png" class="w-24 h-24" alt="">
                            <div class="w-full">
                                <h2 class="mb-3 text-xl"><?= $produkte[$sorte]['name'] ?></h2>
                                <span class="flex flex-col items-center justify-between w-full gap-3 sm:flex-row">
                                    <form action="" method="POST">
                                        Menge: <?= Komponente::input('number', 'Anzahl', 'count', $anzahl) ?>
                                        <?= Komponente::button('Ändern', 'Ändern') ?>
                                    </form>
                                    <form action="" method="POST">
                                        <?= Komponente::button('Entfernen', 'Entfernen', 'red') ?>
                                    </form>
                                    <div class="flex items-center justify-end grow">
                                        <p class="px-3 py-2 text-xl bg-white">CHF <?= sprintf('%.2f', $produkte[$sorte]['preis'] * $anzahl) ?></p>
                                    </div>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="flex flex-col items-center gap-3 px-3 py-3 my-3 bg-gray-200">
                        <div class="flex flex-col items-stretch w-full gap-2 mb-3">
                            <div class="border-t-2 border-black"></div>
                            <div class="border-t-2 border-black"></div>
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <div class="flex gap-4">
                                <form action="" method="POST">
                                    <?= Komponente::button('Warenkorb löschen', 'clear') ?>
                                </form>
                                <?= Komponente::link('Bestellen', 'abschluss.php') ?>
                            </div>
                            <div class="flex items-center justify-end grow">
                                <?php
                                $gesamt = 0;
                                foreach ($_SESSION['warenkorb'] as $sorte => $anzahl) {
                                    $gesamt += $produkte[$sorte]['preis'] * $anzahl;
                                }
                                ?>
                                <span class="flex items-center gap-2">
                                    <p class="text-xl">Gesamt:</p>
                                    <p class="px-3 py-2 text-xl bg-white">CHF <?= sprintf('%.2f', $gesamt) ?></p>
                                </span>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>

</html>