<?php

session_start();

$einstellungen = require('core/einstellungen.php');

// Ziel nach Login speichern
if (isset($_GET['to'])) {
    $_SESSION['afterLoginDestination'] = $_GET['to'];
}

// Warenkorb initalisieren falls noch nicht getan
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

                        // Weiterleitung zu bestimmter Seite nach Login
                        if (isset($_SESSION['afterLoginDestination'])) {
                            $loc = $_SESSION['afterLoginDestination'];
                            unset($_SESSIOn['afterLoginDestination']);
                            header('Location: ' . $loc);
                        } else {
                            header('Location: shop.php');
                        }
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
    <title><?= $einstellungen['firma'] ?> Login</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col gap-16 px-6 py-16 mx-auto max-w-7xl">

        <!-- Fehlermeldungen -->
        <?php if (isset($errors)) echo Komponente::alert(true, $errors) ?>

        <!-- Formular -->
        <section class="max-w-lg p-4 mx-auto bg-white shadow-xl">
            <h1 class="text-4xl">Login</h1>
            <p>Hier kannst du dich mit deinem Account einloggen. Wenn du noch keinen Account hast, kannst du dich <a class="underline text-honeygreen" href="registrierung.php">hier registrieren.</a></p>
            <form class="flex flex-col gap-4 py-4" method="POST" action="">
                <?= Komponente::input('email', 'Deine Email', 'email') ?>
                <?= Komponente::input('password', 'Dein Passwort', 'password') ?>
                <?= Komponente::button('Login', 'login') ?>
            </form>
        </section>

    </main>
</body>

</html>