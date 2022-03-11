<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

require('core/conn.php');
$produkte = require('core/produkte.php');
$einstellungen = require('core/einstellungen.php');

if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
}

$conn = getDatenbank();
$stmt = $conn->prepare("SELECT * FROM Bestellungen");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$bestellungen = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $einstellungen['firma'] ?> Mitarbeiter</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col gap-8 px-6 py-16 mx-auto max-w-7xl">

        <!-- Fehlermeldungen -->
        <?php if (isset($errors)) echo Komponente::alert(true, $errors); ?>

        <section>
            <h1 class="text-4xl">Mitarbeiterbereich</h1>
            <p>Du bist jetzt als Mitarbeiter angemeldet. Du kannst jetzt Bestellungen stornieren.</p>
        </section>

        <section class="w-full p-4 mx-auto bg-white rounded-md shadow-xl">
            <div class="flex flex-col px-8 py-8 mt-4 border-4">
                <?php if (empty($bestellungen)) : ?>
                    <p class="mb-4">Es gibt noch keine Bestellungen!</p>
                    <?= Komponente::link('Zum Shop', 'shop.php') ?>
                <?php else : ?>
                    <?php foreach ($bestellungen as $bestellung) : ?>
                        <div class="flex items-center gap-3 px-3 py-3 my-3 bg-gray-200">
                            <img src="images/<?= $sorte ?>.png" class="w-24 h-24" alt="">
                            <div class="w-full">
                                <h2 class="mb-3 text-xl"><?= $produkte[$sorte]['name'] ?></h2>
                                <span class="flex flex-col items-center justify-between w-full gap-3 sm:flex-row">
                                    <form action="" method="POST">
                                        Menge: <?= Komponente::input('number', 'Anzahl', 'count', $anzahl) ?>
                                        <?= Komponente::button('Ändern', $sorte) ?>
                                    </form>
                                    <form action="" method="POST">
                                        <?= Komponente::button('Entfernen', $sorte, 'red') ?>
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