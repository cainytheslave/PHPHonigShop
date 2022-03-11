## Honig4U Online Shop
### von Muzaffer

Die Version 1.0 des E-Shops der Firma "Honig4U" soll gemäss Gespräch mit dem Geschäftsleiter der Firma überarbeitet werden.

## Dateien die im Betrieb nicht gebraucht werden

- package.json
- package-lock.json
- tailwind.config.js
- tailwind.css
- Ordner node_modules
- .gitignore

## Setup
Um den Shop in Betrieb zu nehmen müssen ein Paar Dinge angepasst werden.

- Alle Dateien im htdocs Ordner speichern: `git clone https://github.com/cainytheslave/PHPHonigShop.git`
- _Optional: Alle Dateien die im Betrieb nicht gebraucht werden entfernen_
- XAMPP starten, (Apache, Mysql)
- Falls Datenbank `Honig4U` bereits existiert: Löschen (https://localhost/phpmyadmin)
- Dann zuerst die Datei ./core/datenbank.php __im Editor__ öffnen
- Ändere die Datenbank Zugangsdaten in der Datei so, dass Sie mit der lokalen Datenbank übereinstimmen
- Öffne deinen Browser und navigiere zum Projektordner/core/datenbank.php
- Jetzt sollten mehrere Erfolgsnachrichten erscheinen, falls die Datenbank Datei richtig konfiguriert ist.

:white_check_mark: Geschafft! Der Shop ist nun einsatzbereit.

## Test-Accounts

Kunde:
:globe_with_meridians: Email: _kunde@honig4u.ch_
:key: Passwort: _IchKaufeHonig_

Mitarbeiter:
:globe_with_meridians: Email: _mitarbeiter@honig4u.ch_
:key: Passwort: _IchKannStornieren_

## Informationen
- programmiert mit PHP 8
- Plain PHP, keine externen PHP Skripts
- Styling mit TailwindCSS
- Javascript Mobile Menu mit AlpineJS
- MySQL Datenbank
- Datenbank Verbindung nur mit PDO
- Sessions zum Speichern von Warenkorb, Angemeldeter Nutzer
- Für Mobilgeräte optimiert

## Seiten
Startseite
: Leitet weiter zum Shop 

Shop
: Zeigt alle Produkte an, Produkte können in den Warenkorb gelegt werden

Warenkorb
: Zeigt alle Produkte an, die momentan im Warenkorb liegen, Positionen lassen sich löschen oder die Quantität verändern

Login
: Registrierte Benutzer können sich hier anmelden. Die Accounts sind persistent in der Datenbank gespeichert. Leitet danach direkt auf den Shop weiter.

Registrierung
: Neue Benutzer können sich hier einen Account anlegen, leitet danach direkt auf den Shop weiter.

Mitarbeiterbereich
: Eingeloggte Mitarbeiter können hier Bestellungen stornieren.
