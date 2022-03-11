<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

require('core/conn.php');
$produkte = require('core/produkte.php');
$einstellungen = require('core/einstellungen.php');

if (!isset($_SESSION['warenkorb'])) {
    $_SESSION['warenkorb'] = [];
}

$conn = getDatenbank();
$stmt = $conn->prepare("SELECT * FROM Bestellungen");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$bestellungen = $stmt->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $einstellungen['firma'] ?> Mitarbeiter</title>

    <?php include('includes/head.inc.php') ?>
</head>

<body class="font-mono">

    <?php include('includes/header.inc.php') ?>

    <main class="flex flex-col gap-8 px-6 py-16 mx-auto max-w-7xl">

        <!-- Fehlermeldungen -->
        <?php if (isset($errors)) echo Komponente::alert(true, $errors); ?>

        <section>
            <h1 class="text-4xl">Mitarbeiterbereich</h1>
            <p>Du bist jetzt als Mitarbeiter angemeldet. Du kannst jetzt Bestellungen stornieren.</p>
        </section>

        <section class="w-full p-4 mx-auto bg-white rounded-md shadow-xl">
            <div class="flex flex-col py-8 px-6 mt-4 border-4">
                <?php if (empty($bestellungen)) : ?>
                    <p class="mb-4">Es gibt noch keine Bestellungen!</p>
                    <?= Komponente::link('Zum Shop', 'shop.php') ?>
                <?php else : ?>
                    <table class="w-full table-auto">
                        <thead class="bg-gray-200">
                            <tr>
                                <th>BestellNR.</th>
                                <th>KundenNR.</th>
                                <th>Summe</th>
                                <th>Datum</th>
                                <th>Aktionen</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <?php $counter = 0 ?>
                            <?php foreach ($bestellungen as $bestellung) : ?>
                                <?php

                                $summe = 0;
                                $summe += $bestellung['akazienhonig'] * $produkte['akazie']['preis'];
                                $summe += $bestellung['heidehonig'] * $produkte['heide']['preis'];
                                $summe += $bestellung['kleehonig'] * $produkte['klee']['preis'];
                                $summe += $bestellung['tannenhonig'] * $produkte['tannen']['preis'];

                                ?>

                                <tr class="py-2 <?= ($counter % 2 == 0) ? 'bg-white' : 'bg-gray-200' ?>">
                                    <th class="py-2"><?= $bestellung['id'] ?></th>
                                    <th class="py-2"><?= $bestellung['kunde'] ?></th>
                                    <th class="py-2"><?= sprintf('CHF %.2f', $summe) ?></th>
                                    <th class="py-2"><?= $bestellung['erstellt_am'] ?></th>
                                    <th class="py-2">
                                        <form action="" method="POST">
                                            <input type="number" name="bestellnummer" value="<?= $bestellung['id'] ?>" class="hidden">
                                            <?= Komponente::button('Stornieren', 'stornieren', 'red') ?>
                                        </form>
                                    </th>
                                </tr>
                                <?php $counter++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>

</html>