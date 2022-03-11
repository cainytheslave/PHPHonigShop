<?php

session_start();

if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
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
        <?php if (isset($success) && count($success) > 0) : ?>
            <section class="bg-green-300 mt-4 border-2 w-full border-green-500 mx-auto shadow-xl p-4">
                <?php foreach ($success as $success) : ?>
                    <p class="text-lg font-semibold">Erfolg: <?= $success ?></p>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
        <?php if (isset($errors) && count($errors) > 0) : ?>
            <section class="bg-red-300 border-2 mt-4 w-full border-red-500 mx-auto shadow-xl p-4">
                <?php foreach ($errors as $error) : ?>
                    <p class="text-lg font-semibold">Error: <?= $error ?></p>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
        <section class="my-8">
            <h1 class="text-3xl">Honig4U Shop</h1>
            <p>Hier kannst du Produkte in den Warenkorb legen.</p>
        </section>
        <section class="grid lg:grid-cols-2 gap-8 md:gap-16">
            <div class="bg-white shadow rounded-md flex flex-col sm:flex-row p-6 hover:scale-110 transition-transform">
                <img src="images/akazie.png" class="object-contain w-52 h-52" alt="">
                <div>
                    <h2 class="text-xl">Akazienhonig</h2>
                    <p>Leckerer Akazienhonig, direkt abgezapft vom Akazienbaum deines Vertrauens.</p>
                    <p class="font-semibold mt-3">Preis: <span class="text-xl">8,50CHF</span><span class="text-xs font-thin"> /500g</span></p>
                    <form class="flex items-stretch gap-3 mt-3" action="" method="POST">
                        <input class="px-2 py-2 w-24 rounded ring-2 ring-honey" type="number" required min="0" name="count" placeholder="Anzahl">
                        <input class="px-2 py-2 rounded grow ring-2 ring-honey" type="submit" required name="akazie" value="In den Warenkorb">
                    </form>
                </div>
            </div>
            <div class="bg-white shadow rounded-md flex flex-col sm:flex-row p-6 hover:scale-110 transition-transform">
                <img src="images/heide.png" class="object-contain w-52 h-52" alt="">
                <div>
                    <h2 class="text-xl">Heidehonig</h2>
                    <p>Leckerer Heidehonig, ist seinen Preis wert denn es war eine Heidenarbeit!</p>
                    <p class="font-semibold mt-3">Preis: <span class="text-xl">12,50CHF</span><span class="text-xs font-thin"> /500g</span></p>
                    <form class="flex items-stretch gap-3 mt-3" action="" method="POST">
                        <input class="px-2 py-2 w-24 rounded ring-2 ring-honey" type="number" required min="0" name="count" placeholder="Anzahl">
                        <input class="px-2 py-2 rounded grow ring-2 ring-honey" type="submit" required name="heide" value="In den Warenkorb">
                    </form>
                </div>
            </div>
            <div class="bg-white shadow rounded-md flex flex-col sm:flex-row p-6 hover:scale-110 transition-transform">
                <img src="images/klee.png" class="object-contain w-52 h-52" alt="">
                <div>
                    <h2 class="text-xl">Kleehonig</h2>
                    <p>Vierblättriger Kleehonig. Der sortenreine Blütenhonig mit einem milden Aroma.</p>
                    <p class="font-semibold mt-3">Preis: <span class="text-xl">6,50CHF</span><span class="text-xs font-thin"> /500g</span></p>
                    <form class="flex items-stretch gap-3 mt-3" action="" method="POST">
                        <input class="px-2 py-2 w-24 rounded ring-2 ring-honey" type="number" required min="0" name="count" placeholder="Anzahl">
                        <input class="px-2 py-2 rounded grow ring-2 ring-honey" type="submit" required name="klee" value="In den Warenkorb">
                    </form>
                </div>
            </div>
            <div class="bg-white shadow rounded-md flex flex-col sm:flex-row p-6 hover:scale-110 transition-transform">
                <img src="images/tannen.png" class="object-contain w-52 h-52" alt="">
                <div>
                    <h2 class="text-xl">Tannenhonig</h2>
                    <p>Leckerer Tannenhonig. Mit seinen würzig-kräftigen Aromen ein Genuss für jeden Feinschmecker.</p>
                    <p class="font-semibold mt-3">Preis: <span class="text-xl">10,00CHF</span><span class="text-xs font-thin"> /500g</span></p>
                    <form class="flex items-stretch gap-3 mt-3" action="" method="POST">
                        <input class="px-2 py-2 w-24 rounded ring-2 ring-honey" type="number" required min="0" name="count" placeholder="Anzahl">
                        <input class="px-2 py-2 rounded grow ring-2 ring-honey" type="submit" required name="tannen" value="In den Warenkorb">
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>