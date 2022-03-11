<?php

session_start();

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
    <title>Honig4U</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col py-16 gap-16 mx-auto max-w-7xl">
        <!-- Hero Section -->
        <div class="relative flex justify-center h-64 gap-16 w-full shadow-md rounded-xl overflow-hidden">
            <div class="flex px-16 items-center bg-white h-full">
                <div class="flex flex-col gap-4">
                    <h1 class="text-4xl">Willkommen</h1>
                    <p>Im Honig4U Online Shop</p>
                    <a href="shop.php" class="px-3 w-min whitespace-nowrap py-2 rounded-md border-2 border-blue-800">
                        Zum Shop
                    </a>
                </div>
            </div>

            <div class="p-6 h-32">
                <img class="object-contain h-52" src="images/akazie.png" alt="">
            </div>

        </div>

        <!-- Hero Section -->
        <div class="relative flex h-64 w-full gap-16 justify-center shadow-md rounded-xl overflow-hidden">

            <div class="p-6 h-32">
                <img class="object-contain h-52" src="images/heide.png" alt="">
            </div>

            <div class="flex px-16 items-center bg-white h-full">
                <div class="flex flex-col gap-4">
                    <h1 class="text-4xl">Du hast noch keinen Account?</h1>
                    <p>Erstelle dir kostenlos einen Account!</p>
                    <a href="registrierung.php" class="px-3 w-min whitespace-nowrap py-2 rounded-md border-2 border-blue-800">
                        Account erstellen
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>