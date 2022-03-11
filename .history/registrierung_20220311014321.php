<?php

session_start();

$einstellungen = require('core/einstellungen.php');

if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
}

if (isset($_POST['register'])) {
    if (isset($_POST['vorname']) && isset($_POST['nachname']) && isset($_POST['email']) && isset($_POST['password'])) {
        require('core/conn.php');
        $conn = getDatenbank();

        if (strlen($_POST['password']) < 9) {
            $errors = ['Das Passwort muss mindestens 9 Zeichen lang sein.'];
        } else {
            try {
                $id = "";
                for ($i = 0; $i < 4; $i++) {
                    $id .= random_int(0, 9);
                }

                $id = intval($id);
                $vorname = $_POST['vorname'];
                $nachname = $_POST['nachname'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


                $sql = "INSERT INTO Kunden (id, vorname, nachname, email, password) VALUES ($id, '$vorname', '$nachname', '$email', '$password')";

                $conn->exec($sql);

                $_SESSION['user'] = [
                    'id' => $id,
                    'vorname' => $vorname,
                    'nachname' => $nachname,
                    'email' => $email
                ];

                header('Location: shop.php');
            } catch (PDOException $e) {
                $errors = [$e->getMessage()];
            }
        }
    } else {
        $errors = [
            'Bitte fülle alle Felder aus um dich zu registrieren.'
        ];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $einstellungen['firma'] ?> Registrierung</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col gap-16 py-16 mx-auto max-w-7xl">

        <!-- Fehlermeldungen -->
        <?php if (isset($errors)) echo Komponente::alert(true, $errors) ?>

        <section class="max-w-lg p-4 mx-auto bg-white shadow-xl">
            <h1 class="text-4xl">Registrieren</h1>
            <p>Hier kannst du einen neuen Account anlegen. Wenn du bereits einen Account besitzt, kannst du dich <a class="underline text-honeygreen" href="login.php">hier einloggen.</a></p>
            <form class="flex flex-col gap-4 py-4" method="POST" action="">
                <div class="flex items-center justify-between gap-3">
                    <input class="px-2 py-2 rounded ring-2 ring-honey" type="text" required name="vorname" placeholder="Vorname">
                    <input class="px-2 py-2 rounded grow ring-2 ring-honey" type="text" required name="nachname" placeholder="Nachname">
                </div>
                <input class="px-2 py-2 rounded ring-2 ring-honey" type="email" required name="email" placeholder="Deine Email">
                <input class="px-2 py-2 rounded ring-2 ring-honey" type="password" required name="password" placeholder="Dein Passwort">
                <input type="submit" class="px-2 py-2 text-xl font-semibold rounded ring-2 text-honeygreen ring-honey" name="register" value="Registrieren">
            </form>
        </section>
    </main>
</body>

</html>