<?php
include('conn.php');

/* Muzaffer Abschlussprojekt Honig4U
** 
** Datenbank und Tabellen
*/

// Datenbank erstellen
$conn = getDatenbank(null);

$sql = "CREATE DATABASE Honig4U";

try {
    $conn->exec($sql);
    echo "Datenbank wurde erstellt.<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

// Tabelle Kunden erstellen
$conn = getDatenbank();

$sql = "CREATE TABLE Kunden (
id INT(4) UNSIGNED PRIMARY KEY,
vorname VARCHAR(30) NOT NULL,
nachname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
mitarbeiter TINYINT(1) NOT NULL DEFAULT 0,
erstellt_am TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

try {
    $conn->exec($sql);
    echo "Tabelle Kunden wurde erstellt<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}


// Tabelle Bestellungen erstellen

$sql = "CREATE TABLE Bestellungen (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
kunde INT(6) UNSIGNED,
akazienhonig INT(6) UNSIGNED DEFAULT 0,
heidehonig INT(6) UNSIGNED DEFAULT 0,
kleehonig INT(6) UNSIGNED DEFAULT 0,
tannenhonig INT(6) UNSIGNED DEFAULT 0,
erstellt_am TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (kunde) REFERENCES Kunden(id)
)";

try {
    $conn->exec($sql);
    echo "Tabelle Bestellungen wurde erstellt<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}


// Test-Benutzer und Mitarbeiter

$passwortKunde = password_hash('IchKaufeHonig', PASSWORD_BCRYPT);
$passwortMitarbeiter = password_hash('IchKannStornieren', PASSWORD_BCRYPT);

$sql = "INSERT INTO Kunden (id, vorname, nachname, email, password)
VALUES (6969, 'Kunde', '', '', 'kunde@honig4u.ch', '$passwortKunde')";

try {
    $conn->exec($sql);
    echo "Testkunde wurde erstellt.<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$sql = "INSERT INTO Kunden (id, vorname, nachname, email, password, mitarbeiter)
VALUES (0420, 'Kunde', '', '', 'mitarbeiter@honig4u.ch', '$passwortMitarbeiter', true)";

try {
    $conn->exec($sql);
    echo "TestMitarbeiter wurde erstellt.<br>";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
