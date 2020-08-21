<img src="https://github.com/kayschima/sports-hall-management-calendar/raw/master/public/images/sportshallmanagementcalendar.png" width="100" height="100">

# Sports Hall Management Calendar
([Klicke alternativ hier für die englische Dokumentation](https://github.com/kayschima/sports-hall-management-calendar/blob/master/README.md))

## Über den Sports Hall Management Calendar

Der Sports Hall Management Calendar wurde im Jahr 2020 erstellt, um Sportvereinen die Möglichkeit zu geben, Trainingszeiten unter schwierigen Bedingungen auch in Zeiten von Covid-19 zu planen.

Trainer können im Portal Trainingstermine festlegen und eine bestimmte Anzahl von Trainingsteilnehmern angeben.
Registrierte Athleten können eine der offenen Stellen für eine Trainingseinheit reservieren.

## Dokumentation

### Serveranforderungen
- PHP> = 7,4
- Laravel> = 7
- MySql> = 5.7

- optional:
    - git (auch gut, um die Software auf dem neuesten Stand zu halten)
    - composer
---
### Installation
#### Richten Sie die Software ein:
Holen Sie sich den Sourcecode:
Gehen Sie zu Ihrem Terminal und geben Sie Folgendes ein:
```shell
git clone https://github.com/kayschima/sports-hall-management-calendar.git
```
oder entpacke die heruntergeladene ZIP-Datei auf der GitHub-Seite:
https://github.com/kayschima/sports-hall-management-calendar/archive/master.zip

Fahren Sie nun mit der Installation fort:
```shell
cd sports-hall-management-calendar
cp .env.example .env
composer install -o --no-dev
php artisan key_generate
php artisan storage:link
```
(Verwenden Sie nicht die Option  `--no-dev`, wenn Sie das Paket im Entwicklungsmodus verwenden möchten.)

#### Datenbank und Umgebung einrichten:
 - Konfigurieren Sie Ihre Datenbankparameter und Anmeldeinformationen in der .env-Datei
 - Migrieren Sie die Datenbank
 ```shell
 php artisan migrate
 ```
 - Setzen Sie `APP_ENV=production` in der `.env` -Datei
 - Setzen Sie `APP_DEBUG = false` in der `.env` -Datei
 - Stellen Sie die `SMHC_`-Werte nach Ihren Wünschen ein
 
 Der Sporthalle-Verwaltungskalender unterstützt die folgenden Sprachen:
 - Englisch (`APP_LOCALE=en`)
 - Deutsch (`APP_LOCALE=de`)
---
#### Generieren Sie einen Administrator
Führen Sie den Befehl `php artisan shmc: addadmin <Name> <Mail> <Kennwort>` aus, z.
```shell
php artisan shmc:addadmin "The Administrator" admin@admin-world.de ThePassword
```
---
#### Löschen Sie nicht mehr benötigte Benutzerprofilfotos
Wenn Sie Benutzerprofilfotos löschen möchten, die nicht mehr benötigt werden, führen Sie einfach den Befehl 
```shell
php artisan shmc:removeunusedphotos
```
aus.

---
#### Löschen Sie vergangene Trainingstermine
Wenn Sie bereits vergangene Trainingstermine löschen möchten, führen Sie einfach den Befehl 
```shell
php artisan shmc:removepasttrainings
```
aus.

---
Sie können alle Befehle in regelmäßigen Abständen über das Administrationsmenü, manuell über die Konsole oder über einen Cron-Job ausführen.

---

## Sicherheitslücken

Wenn Sie im Sporthalle-Verwaltungskalender eine Sicherheitslücke entdecken, senden Sie bitte eine E-Mail an Kay Markschies über [kayschima@web.de] (mailto: kayschima@web.de). Alle Sicherheitslücken werden umgehend behoben.

## Lizenz

Der Sports Hall Management Calendar ist eine Open-Source-Software, die unter der [MIT-Lizenz] (https://opensource.org/licenses/MIT) lizenziert ist.
