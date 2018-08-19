# Próbamunka

URL forgalom írányitó.

## Szükséges programok lokális teszteléshez
 ```sh
  MongoDB adatbázis szerver
  Virtuális web szerver pl.Xampp, Wampp.
  ```
## Telepítés (Xampp web szerverhez)
```sh
1. Töltse le és telepítse a XAMPP web szerverét az alábbi címről: https://www.apachefriends.org/hu/index.html
2. Töltse le a megfelelő mongodb driver dll-t az alábbi címről: http://pecl.php.net/package/mongodb/1.5.2/windows 
Majd másolja be a mongodb.dll fájlt a xampp/php/ext mappába.
3. Adja hozzá a php.ini fájlhoz az alábbi: extension=php_mongodb.dll
4. Klónozza ezt a projektet majd másolja be a xampp/htdocs mappába.
```
## Futtatás
```sh
1. Futtassuk a XAMPP control-center-t.
2. Indítsuk el az apache nevű szolgáltatást a "Start" gomb megnyomásával.
3. Nyissunk meg egy böngészőt és ugorjunk a következő címre: 127.0.0.1
4. Lépjünk be a projekt mappájába.
```
## Felhasznált technológiák
 ```sh
 Composer
 MongoDB
 PHP
 Bootstrap 4
 JQuery
```
## Fejlesztői eszközök
 ```sh
 Sublime Text 3 (free)
 Xampp
 MongoDB
 MongoDB Compass
 ```
 ## Funkciók
 
### Új begyezés
 Új bejegyzést hozz létre az adatbázisban, illetve teljes URL-t készít.
 A paraméterben megadott hoszt név, nyelvi kód, entitás típus illetve azonosító, a metódust, aminek végre kell hajtódnia, illetve az URL részeit használja. A teljes URL-t a hoszt névből, nyelvi kódból illetve az URL részekből építi fel, majd ellenőrzi, hogy tartalmaz-e az angol ABC-n és a "/","_","-" kívüli karaktereket. Ha nem beírja az adatbázisba ellenkező esetben nem.

### Bejegyzés frissítése
Egy már meglévő bejegyzést frissít.
A paraméterben megadott bejegyzés azonosítót, modul azonosítót és típust, nyelvi kódot, végrehajtandó metódust, és a teljes URL-t használja.
Először is megvizsgálja, hogy a modul típusa és azonosítója, a nyelvi kód, a végrehajtandó metódus és a teljes URL adatok egyeznek a tárolt verzióval. Ha igen akkor nem történik adatmódosítás, hanem a bejegyzéssel tér vissza a program. Ellenkező esetben a tárolt változat HTTP kódját átírja 301-re illetve, új bejegyzést hozz létre a tárolt változattal kiegészítve a cél URL megadásával.

### Idejétmúlt bejegyzések törlése
A három napnál régebbi és 301-es HTTP kóddal rendelkező bejegyzéseket törli.
Az adatbázisból lekéri az összes értéket és egyenként vizsgálja azoknak frissítési dátumát. Amely régebbi, mint 3 nap azt törli.

### Bejegyzés feloldása
Átirányítás végző metódus.
A paraméterben megadott teljes URL használatával működik.
Megkeresi, az adatbázisban a kapott URL-t majd megvizsgálja, hogy van-e olyan, amely 200-as HTTP kóddal rendelkezik. Ebben az esetben a bejegyzéssel tér vissza a program. Ellenkező esetben megkeresi az időrendben a legutolsó bejegyzést ahol a teljes URL egyezik és a HTTP kódja 301, majd átirányítja a bejegyzésben tárolt cél URL címre. Végső esetben pedig a program a "notfound.php" címre irányít át.

### Entitáshoz tartózó URL lekérdezése
Egy adott entitáshoz tartozó URL lekérdezését végzi.
A paraméterben megadott entitás azonosító alapján kilistázza a teljes URL címeket, minden olyan bejegyzésnél ahol az entitás azonosító megegyezik.
