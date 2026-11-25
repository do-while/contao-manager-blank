# do-while/contao-manager-blank

Öffnet den Menüpunkt „Contao Manager“ im Backend von Contao 5 in einem neuen Fenster.

## Voraussetzungen

- Contao 5.x
- PHP 8.1 oder höher

## Installation

Das Repository in der `composer.json` der Contao-Installation eintragen
(die URL durch die eigene ersetzen):

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://example.com/contao-manager-blank.git"
    }
]
```

Anschließend das Paket installieren:

```bash
composer require do-while/contao-manager-blank:dev-main
```

Das Bundle wird über das Contao-Manager-Plugin automatisch registriert.
Weitere Einstellungen sind nicht nötig.

## Funktionsweise

Der Hook `outputBackendTemplate` ergänzt im Template `be_main` jeden Link,
dessen Adresse `contao-manager` enthält, um ein `target` mit einem Fensternamen,
der aus der Manager-Adresse gebildet wird. Ein bereits über den Link geöffnetes
Manager-Fenster wird dadurch wiederverwendet, getrennt je Domain.
Ein `onclick`-Attribut holt ein bestehendes Fenster nach vorn, ohne den Manager
neu zu laden.
Links mit vorhandenem `target`-Attribut bleiben unverändert.

## Deinstallation

```bash
composer remove do-while/contao-manager-blank
```
