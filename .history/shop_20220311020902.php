<?php
// Session starten
session_start();

// Produktdaten holen
$produkte = require('core/produkte.php');
$einstellungen = require('core/einstellungen.php');

// Warenkorb erstellen wenn noch nicht passiert
if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
}

// Lauschen ob etwas in den Warenkorb gelegt wurde
foreach ($produkte as $id => $produkt) {
    if (isset($_POST[$id])) {
        if (isset($_POST['count'])) {
            if (is_numeric($_POST['count'])) {
                $vorherigerStand = 0;
                if (isset($_SESSION['warenkorb'][$id])) {
                    $vorherigerStand = $_SESSION['warenkorb'][$id];
                }
                $_SESSION['warenkorb'][$id] = intval($_POST['count']) + $vorherigerStand;

                $success = ['Super! ' . $_POST['count'] . ' Gläser ' . $produkt['name'] . ' wurden in den Warenkorb gelegt.'];
            } else {
                $errors = ['Die Anzahl muss eine Zahl sein.'];
            }
        } else {
            $errors = ['Das Feld Anzahl muss ausgefüllt werden.'];
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $einstellungen['firma'] ?> Shop</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="px-6 mx-auto max-w-7xl lg:px-0">

        <!-- Erfolgsmeldungen -->
        <?php if (isset($success)) echo Komponente::alert(false, $success) ?>

        <!-- Fehlermeldungen -->
        <?php if (isset($errors)) echo Komponente::alert(true, $errors) ?>

        <!-- Titel -->
        <section class="my-8">
            <h1 class="text-3xl">Honig4U Shop</h1>
            <p>Hier kannst du Produkte in den Warenkorb legen.</p>
        </section>

        <!-- Produkte -->
        <section class="grid gap-8 lg:grid-cols-2 md:gap-16">
            <?php foreach ($produkte as $id => $produkt) : ?>
                <div class="flex flex-col p-6 bg-white rounded-md shadow sm:flex-row hover:scale-105">
                    <img src="images/<?= $id ?>.png" class="object-contain w-52 h-52" alt="">
                    <div>
                        <h2 class="text-xl"><?= $produkt['name'] ?></h2>
                        <p><?= $produkt['beschreibung'] ?></p>
                        <p class="mt-3 font-semibold">Preis: <span class="text-xl"><?= $produkt['preis'] ?>CHF</span><span class="text-xs font-thin"> /500g</span></p>
                        <form class="flex items-stretch gap-3 mt-3" action="" method="POST">
                            <?= Komponente::input('number', 'Anzahl', 'count') ?>
                            <?= Komponente::button('In den Warenkorb', $id, 'green') ?>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>

    </main>
</body>

</html>