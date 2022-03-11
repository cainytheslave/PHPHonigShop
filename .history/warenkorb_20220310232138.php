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
    <title><?= $einstellungen['firma'] ?> Warenkorb</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col gap-16 py-16 mx-auto max-w-7xl">
        <?php if (isset($errors) && count($errors) > 0) : ?>
            <section class="bg-red-300 border-2 border-red-500 rounded-md w-full mx-auto shadow-xl p-4">
                <?php foreach ($errors as $error) : ?>
                    <p class="text-lg font-semibold">Error: <?= $error ?></p>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
        <section class="bg-white w-full mx-auto rounded-md shadow-xl p-4">
            <h1 class="text-4xl">Warenkorb</h1>
            <p>Hier siehst du, was aktuell in deinem Warenkorb liegt</p>
            <?php if (!isset($_SESSION['user'])) echo '<p>Um die Bestellung abzuschließen, musst du dich erst <a class="underline text-honeygreen" href="login.php">hier einloggen.</a></p>'; ?>
            <div class="flex flex-col py-8 border-4 mt-4 px-8">
                <?php if (empty($_SESSION['warenkorb'])) : ?>
                    <span class="">
                        <p class="mb-4">Dein Warenkorb ist noch leer!</p>
                        <a href="shop.php" class="px-3 py-2 border-2 border-honey rounded">Zum Shop</a>
                    </span>
                <?php else : ?>
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
                    <div class="flex items-center gap-3 my-3 bg-gray-200 py-3 px-3">
                        <hr>
                        <hr>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>

</html>