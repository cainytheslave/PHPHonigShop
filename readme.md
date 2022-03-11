<div id="header">

![alt text](images/logo.svg)
<div>

## Honig4U Online Shop
### von Muzaffer
</div>

</div>

---

Die Version 1.0 des E-Shops der Firma "Honig4U" soll gemäss Gespräch mit dem Geschäftsleiter der Firma überarbeitet werden.

## Informationen
---
- programmiert mit PHP 8
- Plain PHP, keine externen PHP Skripts
- Styling mit TailwindCSS
- Javascript Mobile Menu mit AlpineJS
- MySQL Datenbank
- Datenbank Verbindung nur mit PDO
- Sessions zum Speichern von Warenkorb, Angemeldeter Nutzer
- Für Mobilgeräte optimiert

## Seiten
---
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
---
Kunde:
- Email: kunde@honig4u.ch
- Passwort: IchKaufeHonig

Mitarbeiter:
- Email: mitarbeiter@honig4u.ch
- Passwort: IchKannStornieren



<style type="text/css">
    img {
        height: 60px;
        margin-right:15px;
    }
    div#header {
        display:flex;
        justify-content:
    }
</style>