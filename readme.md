## Honig4U Online Shop
### von Muzaffer

Die Version 1.0 des E-Shops der Firma "Honig4U" soll gemäss Gespräch mit dem Geschäftsleiter der Firma überarbeitet werden.

## Setup
Um den Shop in Betrieb zu nehmen müssen ein Paar Dinge angepasst werden.

- Alle Dateien im htdocs Ordner speichern
- XAMPP starten, (Apache, Mysql)
- Dann zuerst die Datei core/Datenbank.php öffnen
- Ändere die Datenbank Zugangsdaten in der Datei so, dass Sie mit der lokalen Datenbank übereinstimmen
- Öffne deinen Browser und navigiere zum Projektordner
- Navigiere dann zu core/Datenbank.php
- Jetzt sollten mehrere Erfolgsnachrichten erscheinen, falls die Datenbank Datei richtig konfiguriert ist.

[x] Geschafft! Der Shop ist nun einsatzbereit.

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

## Test-Accounts

Kunde:
- Email: kunde@honig4u.ch
- Passwort: IchKaufeHonig

Mitarbeiter:
- Email: mitarbeiter@honig4u.ch
- Passwort: IchKannStornieren