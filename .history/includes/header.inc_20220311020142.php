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

        <!-- Navigation-->
        <div class="items-center hidden gap-6 sm:flex">
            <?= Komponente::link('Home', 'index.php', 'green') ?>
            <?= Komponente::link('Shop', 'shop.php', 'green') ?>
        </div>

        <!-- Warenkorb / Login -->
        <div class="flex items-center gap-4">
            <?php if (isset($_SESSION['user'])) : ?>

                <?= Komponente::link('<img src="images/basket.svg" class="w-10 h-10" alt="">', 'warenkorb.php') ?>

                <?= Komponente::link('<img src="images/logout.svg" class="w-10 h-10" alt="">', 'logout.php?to=login.php') ?>
            <?php else : ?>
                <?= Komponente::link('Login', 'login.php') ?>
                <?= Komponente::link('Registrieren', 'registrierung.php') ?>
            <?php endif; ?>
        </div>

        <!-- Mobile Trigger -->
        <img @click="open = !open" src="images/menu.svg" class="block w-10 h-10 sm:hidden" alt="">
    </div>

    <!-- Mobile Menu -->
    <div class="flex flex-col gap-2 px-2 border-t-2 sm:hidden" x-show="open" style="display:none">
        <!-- Navigation-->
        <ul class="items-center hidden gap-16 sm:flex">
            <li class="text-lg border-b-2 border-honeygreen">
                <a href="index.php" class="text-honey">Home</a>
            </li>
            <li class="text-lg border-b-2 border-honeygreen">
                <a href="shop.php" class="text-honey">Shop</a>
            </li>
        </ul>
    </div>
</header>