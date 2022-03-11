<?php

require('core/Komponente.php');
$einstellungen = require('core/einstellungen.php');

?>

<!-- Header -->
<header class="w-full bg-gray-100" x-data="{open: false}">
    <!-- Desktop -->
    <div class="flex items-center justify-between px-3 py-3 mx-auto max-w-7xl">

        <!-- Logo -->
        <div class="flex items-center gap-4">
            <img src="images/logo.svg" class="w-12 h-12" alt="Logo">
            <p class="text-xl font-semibold text-honey"><?= $einstellungen['firma'] ?></p>
        </div>

        <!-- Mobile Menu -->
        <img @click="open = !open" src="images/menu.svg" class="block w-10 h-10 sm:hidden" alt="">

        <!-- Navigation-->
        <ul class="items-center hidden gap-16 sm:flex">
            <li class="text-lg border-b-2 border-honeygreen">
                <a href="index.php" class="text-honey">Home</a>
            </li>
            <li class="text-lg border-b-2 border-honeygreen">
                <a href="shop.php" class="text-honey">Shop</a>
            </li>
        </ul>

        <!-- Warenkorb / Login -->
        <div class="items-center hidden gap-4 sm:flex">
            <?php if (isset($_SESSION['user'])) : ?>

                <?= Komponente::link('<img src="images/basket.svg" class="w-10 h-10" alt="">', 'warenkorb') ?>

                <?= Komponente::link() ?>
            <?php else : ?>
                <a href="login.php" class="flex items-center gap-2 px-2 py-1 font-semibold text-honey ring-2 ring-honeygreen">
                    Login
                </a>
                <a href="registrierung.php" class="flex items-center gap-2 px-2 py-1 font-semibold text-white ring-2 ring-honey bg-honeygreen">
                    Registrieren
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- -->
    <div class="flex flex-col gap-2 px-2 border-t-2 sm:hidden" x-show="open" style="display:none">
        <ul class="flex flex-col gap-2">
            <a href="index.php" class="text-honey">
                <li class="py-3 text-lg text-center border-2 rounded-md border-b-none border-honeygreen">
                    Home
                </li>
            </a>
            <a href="shop.php" class="text-honey">
                <li class="py-3 text-lg text-center border-2 rounded-md border-honeygreen">
                    Shop
                </li>
            </a>
        </ul>
        <div class="items-center gap-4">
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="warenkorb.php" class="relative flex items-center gap-3" x-data="{open: false}" @click="open = !open">
                    <p>Warenkorb</p>
                    <img src="images/basket.svg" class="w-10 h-10" alt="">
                </a>
            <?php else : ?>
                <div class="flex gap-3">
                    <a href="login.php" class="flex items-center gap-2 px-2 py-1 font-semibold rounded-md text-honey grow ring-2 ring-honeygreen">
                        Login
                    </a>
                    <a href="registrierung.php" class="flex items-center gap-2 px-2 py-1 font-semibold text-white rounded-md grow ring-2 ring-honey bg-honeygreen">
                        Registrieren
                    </a>
                </div>

            <?php endif; ?>
        </div>
    </div>
</header>