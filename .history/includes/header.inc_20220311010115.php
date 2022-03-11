<?php

require('core/Komponente.php');
$einstellungen = require('core/einstellungen.php');

?>

<!-- Header -->
<header class="w-full bg-gray-100" x-data="{open: false}">
    <!-- Desktop -->
    <div class="max-w-7xl px-3 flex items-center justify-between mx-auto py-3">

        <!-- Logo -->
        <div class="flex items-center gap-4">
            <img src="images/logo.svg" class="w-12 h-12" alt="Logo">
            <p class="text-xl font-semibold text-honey"><?= $einstellungen['firma'] ?></p>
        </div>

        <!-- Mobile Menu -->
        <img @click="open = !open" src="images/menu.svg" class="block sm:hidden w-10 h-10" alt="">

        <!-- Navigation-->
        <ul class="hidden sm:flex items-center gap-16">
            <li class="text-lg border-b-2 border-honeygreen">
                <a href="index.php" class="text-honey">Home</a>
            </li>
            <li class="text-lg border-b-2 border-honeygreen">
                <a href="shop.php" class="text-honey">Shop</a>
            </li>
        </ul>

        <!-- Warenkorb / Login -->
        <div class="hidden sm:flex items-center gap-4">
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="warenkorb.php" class="relative flex gap-3 items-center" x-data="{open: false}" @click="basketOpen = !basketOpen">
                    
                </a>
                <?= (new Link('<img src="images/basket.svg" class="w-10 h-10" alt="">', 'warenkorb')).

                <form action="" method="POST">

                </form>
            <?php else : ?>
                <a href="login.php" class="text-honey flex items-center gap-2 px-2 py-1 ring-2 ring-honeygreen font-semibold">
                    Login
                </a>
                <a href="registrierung.php" class="flex items-center gap-2  px-2 py-1 ring-2 ring-honey bg-honeygreen text-white font-semibold">
                    Registrieren
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- -->
    <div class="flex flex-col gap-2 border-t-2 px-2 sm:hidden" x-show="open" style="display:none">
        <ul class="flex flex-col gap-2">
            <a href="index.php" class="text-honey">
                <li class="text-lg border-2 rounded-md border-b-none py-3 text-center border-honeygreen">
                    Home
                </li>
            </a>
            <a href="shop.php" class="text-honey">
                <li class="text-lg border-2 rounded-md py-3 text-center border-honeygreen">
                    Shop
                </li>
            </a>
        </ul>
        <div class="items-center gap-4">
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="warenkorb.php" class="relative flex gap-3 items-center" x-data="{open: false}" @click="open = !open">
                    <p>Warenkorb</p>
                    <img src="images/basket.svg" class="w-10 h-10" alt="">
                </a>
            <?php else : ?>
                <div class="flex gap-3">
                    <a href="login.php" class="text-honey grow flex items-center gap-2 px-2 py-1 ring-2 ring-honeygreen rounded-md font-semibold">
                        Login
                    </a>
                    <a href="registrierung.php" class="flex grow items-center gap-2  px-2 py-1 ring-2 ring-honey rounded-md bg-honeygreen text-white font-semibold">
                        Registrieren
                    </a>
                </div>

            <?php endif; ?>
        </div>
    </div>
</header>