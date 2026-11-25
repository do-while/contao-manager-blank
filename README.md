# do-while/contao-manager-blank

Öffnet den Menüpunkt „Contao Manager“ im Backend von Contao 5 in einem neuen Browser-Fenster.

## Voraussetzungen

- Contao 5.x
- PHP 8.1 oder höher

## Installation

### Mit dem Contao Manager

1. Im Contao Manager unter „Pakete“ nach `do-while/contao-manager-blank` suchen.
2. Das Paket hinzufügen.
3. Die Änderungen anwenden.

### Mit Composer

Im Hauptverzeichnis der Contao-Installation ausführen:

```bash
composer require do-while/contao-manager-blank:^1.0
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
