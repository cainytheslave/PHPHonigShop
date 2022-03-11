<?php

session_start();

require('core/Komponente.php');
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
    <title><?= $einstellungen['firma'] ?></title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col gap-16 py-16 mx-auto max-w-7xl">
        <!-- Hero Section -->
        <div class="relative flex justify-center w-full h-64 gap-16 overflow-hidden shadow-md rounded-xl">
            <div class="flex items-center h-full px-16 bg-white">
                <div class="flex flex-col gap-4">
                    <h1 class="text-4xl">Willkommen</h1>
                    <p>Im <?= $einstellungen['firma'] ?> Online Shop</p>
                    <a href="shop.php" class="px-3 py-2 border-2 border-blue-800 rounded-md w-min whitespace-nowrap">
                        Zum Shop
                    </a>
                </div>
            </div>

            <div class="h-32 p-6">
                <img class="object-contain h-52" src="images/akazie.png" alt="">
            </div>

        </div>

        <!-- Hero Section -->
        <div class="relative flex justify-center w-full h-64 gap-16 overflow-hidden shadow-md rounded-xl">

            <div class="h-32 p-6">
                <img class="object-contain h-52" src="images/heide.png" alt="">
            </div>

            <div class="flex items-center h-full px-16 bg-white">
                <div class="flex flex-col gap-4">
                    <h1 class="text-4xl">Du hast noch keinen Account?</h1>
                    <p>Erstelle dir kostenlos einen Account!</p>
                    <a href="registrierung.php" class="px-3 py-2 border-2 border-blue-800 rounded-md w-min whitespace-nowrap">
                        Account erstellen
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>