<?php

session_start();

$einstellungen = require('core/einstellungen.php');

if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
}

if (isset($_POST['login'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        require('core/conn.php');
        $conn = getDatenbank();

        try {
            $stmt = $conn->prepare("SELECT * FROM Kunden WHERE email = '" . $_POST['email'] . "'");
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $users = $stmt->fetchAll();

            if (count($users) > 0) {
                foreach ($users as $user) {
                    if (password_verify($_POST['password'], $user['password'])) {

                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'vorname' => $user['vorname'],
                            'nachname' => $user['nachname'],
                            'email' => $user['email']
                        ];

                        header('Location: shop.php');
                    } else {
                        $errors = ['Die Email Adresse wurde gefunden, das Passwort ist leider falsch.'];
                    }
                }
            } else {
                $errors = ['Kein Benutzer mit dieser Email Adresse gefunden.'];
            }
        } catch (PDOException $e) {
            $errors = [$e->getMessage()];
        }
    } else {
        $errors = ['Bitte fülle alle Felder aus.'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honig4U Login</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col gap-16 py-16 mx-auto max-w-7xl">
        <?php if (isset($errors) && count($errors) > 0) : ?>
            <section class="bg-red-300 border-2 border-red-500 max-w-lg mx-auto shadow-xl p-4">
                <?php foreach ($errors as $error) : ?>
                    <p class="text-lg font-semibold">Error: <?= $error ?></p>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
        <section class="bg-white max-w-lg mx-auto shadow-xl p-4">
            <h1 class="text-4xl">Login</h1>
            <p>Hier kannst du dich mit deinem Account einloggen. Wenn du noch keinen Account hast, kannst du dich <a class="underline text-honeygreen" href="registrierung.php">hier registrieren.</a></p>
            <form class="flex flex-col gap-4 py-4" method="POST" action="">
                <input class="px-2 py-2 rounded ring-2 ring-honey" type="email" required name="email" placeholder="Deine Email">
                <input class="px-2 py-2 rounded ring-2 ring-honey" type="password" required name="password" placeholder="Dein Passwort">
                <input type="submit" class="px-2 py-2 rounded ring-2 font-semibold text-xl text-honeygreen ring-honey" name="login" value="Einloggen">
            </form>
        </section>
    </main>
</body>

</html>