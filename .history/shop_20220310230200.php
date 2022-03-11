<?php

session_start();

$produkte = require('core/produkte.php');

if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
}

foreach ($produkte as $id => $produkt) {
    if (isset($_POST[$id])) {
    }
}

if (isset($_POST['akazie']) || isset($_POST['heide']) || isset($_POST['klee']) || isset($_POST['tannen'])) {
    if (isset($_POST['count'])) {
        if (is_numeric($_POST['count'])) {
            if (isset($_SESSION['user'])) {
                if (isset($_POST['akazie'])) {
                    if (isset($_SESSION['warenkorb']['akazie'])) {
                        $_SESSION['warenkorb']['akazie'] = $_SESSION['warenkorb']['akazie'] + intval($_POST['count']);
                    } else {
                        $_SESSION['warenkorb']['akazie'] = intval($_POST['count']);
                    }
                    $success = ['Super! ' . $_POST['count'] . ' Gläser Akazienhonig wurden in den Warenkorb gelegt.'];
                } else if (isset($_POST['heide'])) {
                    if (isset($_SESSION['warenkorb']['heide'])) {
                        $_SESSION['warenkorb']['heide'] = $_SESSION['warenkorb']['heide'] + intval($_POST['count']);
                    } else {
                        $_SESSION['warenkorb']['heide'] = intval($_POST['count']);
                    }
                    $success = ['Super! ' . $_POST['count'] . ' Gläser Heidehonig wurden in den Warenkorb gelegt.'];
                } else if (isset($_POST['klee'])) {
                    if (isset($_SESSION['warenkorb']['klee'])) {
                        $_SESSION['warenkorb']['klee'] = $_SESSION['warenkorb']['klee'] + intval($_POST['count']);
                    } else {
                        $_SESSION['warenkorb']['klee'] = intval($_POST['count']);
                    }
                    $success = ['Super! ' . $_POST['count'] . ' Gläser Kleehonig wurden in den Warenkorb gelegt.'];
                } else {
                    if (isset($_SESSION['warenkorb']['tannen'])) {
                        $_SESSION['warenkorb']['tannen'] = $_SESSION['warenkorb']['tannen'] + intval($_POST['count']);
                    } else {
                        $_SESSION['warenkorb']['tannen'] = intval($_POST['count']);
                    }
                    $success = ['Super! ' . $_POST['count'] . ' Gläser Tannenhonig wurden in den Warenkorb gelegt.'];
                }
            } else {
                header('Location: login.php');
            }
        } else {
            $errors = ['Die Anzahl muss eine Zahl sein.'];
        }
    } else {
        $errors = ['Das Feld Anzahl muss ausgefüllt werden.'];
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honig4U Shop</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="mx-auto max-w-7xl px-4 lg:px-0">

        <!-- Erfolgsmeldungen -->
        <?php if (isset($success) && count($success) > 0) : ?>
            <section class="bg-green-300 mt-4 border-2 w-full border-green-500 mx-auto shadow-xl p-4">
                <?php foreach ($success as $success) : ?>
                    <p class="text-lg font-semibold">Erfolg: <?= $success ?></p>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <!-- Fehlermeldungen -->
        <?php if (isset($errors) && count($errors) > 0) : ?>
            <section class="bg-red-300 border-2 mt-4 w-full border-red-500 mx-auto shadow-xl p-4">
                <?php foreach ($errors as $error) : ?>
                    <p class="text-lg font-semibold">Error: <?= $error ?></p>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <!-- Titel -->
        <section class="my-8">
            <h1 class="text-3xl">Honig4U Shop</h1>
            <p>Hier kannst du Produkte in den Warenkorb legen.</p>
        </section>

        <!-- Produkte -->
        <section class="grid lg:grid-cols-2 gap-8 md:gap-16">
            <?php foreach ($produkte as $id => $produkt) : ?>
                <div class="bg-white shadow rounded-md flex flex-col sm:flex-row p-6 hover:scale-110 transition-transform">
                    <img src="images/<?= $id ?>.png" class="object-contain w-52 h-52" alt="">
                    <div>
                        <h2 class="text-xl"><?= $produkt['name'] ?></h2>
                        <p><?= $produkt['beschreibung'] ?></p>
                        <p class="font-semibold mt-3">Preis: <span class="text-xl"><?= $produkt['preis'] ?>CHF</span><span class="text-xs font-thin"> /500g</span></p>
                        <form class="flex items-stretch gap-3 mt-3" action="" method="POST">
                            <input class="px-2 py-2 w-24 rounded ring-2 ring-honey" type="number" required min="0" name="count" placeholder="Anzahl">
                            <input class="px-2 py-2 rounded grow ring-2 ring-honey" type="submit" required name="<?= $id ?>" value="In den Warenkorb">
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>


    </main>
</body>

</html>