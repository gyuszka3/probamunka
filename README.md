# Próbamunka

URL forgalomirányitó.

## Szükséges programok locális teszteléshez
 ```sh
  MongoDB adatbázis szerver
  Virtuális webszerver pl.Xampp,Wampp...
  ```
## Telepités (Xampp webszerverhez)
```sh
1. Töltse le és telepitse a XAMPP webszerverét az alábbi címről: https://www.apachefriends.org/hu/index.html
2. Töltse le a megfelelő mongodb driver dll-t az alábbi címről: http://pecl.php.net/package/mongodb/1.5.2/windows 
majd másolja be a mongodb.dll fájlt a xampp/php/ext mappába.
3. Adja hozzá a php.ini fájlhoz az alábbi:  extension=php_mongodb.dll
4. Klónózza ezt a projektet majd másolja be a xampp/htdocs mappába.
```
## Futtatás
```sh
1. Futtasuk a XAMPP control-center-t.
2. Inditsuk el a apache nevű szolgáltatást a "Start" gomb megnyomásával.
3. Nyissunk meg egy böngészőt és ugorjunk a következő címre: 127.0.0.1
4. Lépjünk be a projekt mappájába.
```
## Felhasznált technologiák
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
 Új bejegyzést hozz létre az adatbázisba, illetve teljes URL-t készít.
 A paraméterben megadott hosztnév,nyelvi kód,entitás típusás illetve azonositóját,a metodust aminek végre kell hajtódnia, illetve az url részeit használja.A teljes URL-t a hosztnévből nyelvikódból illetve a url részekből épiti fel majd ellenőrzi hogy tartalmaz-e az angol ABC-n és a "/_-" kivüli karakterekt. Ha nem beirja az adatbázisba ellenkező esetben nem.

### Bejegyzés frissitése
Már meglévő bejegyzést frissit.
A paraméterben megadott bejegyzés azonositot,modul azonositot és tipust,nyelvi kódot,végrehajtandó metodust,és a teljes URL-t használja.
Elöször is megvizsgálja hogy a modul típusa és azonositója, a nyelvi kód, végrehajtandó metodus és a teljes URL adatok egyeznek a tárolt verzióval. Ha igen akkor nem történik adatmódosítás hanem a bejegyzéssel tér vissza a program.Ellenkező esetben a tárolt változat HTTP kódját átirja 301-re illetve, új bejegyzést hozz létre a tárolt változattal kiegészitve a cél URL megadaásával.

### Idejétmúlt bejegyzések törlése
A három napnál régebbi és 301-es HTTP kóddal rendelkező bejegyzéseket törli.
Az adatbázisból lekéri az összes értéket és egyenként vizsgálja azoknak frissitési dátumát. Amely régebbi mint 3 nap azt törli.

### Bejegyzés feloldása
Átirányitás végző metodus.
A paramétreben megadott teljes URL használtaával müködik.
Megkeresi az adatbázisban a kapott URL-t majd megvizsgálja hogy van-e olyan amely 200-as HTTP kóddal rendelkezik. Ebben az esetben a bejegyzéssel tér vissza a program.Ellenkező esetben megkeresi az időrendben a legutolsó bejegyzést ahol a teljes URL egyezik és a HTTP kódja 301, majd átirányitja a bejegzésben tárolt cél URL cimre. Végső esetben pedig a program a "notfound.php" címre irányít át.

###Entitáshoz tartózó URL lekérdezése
Egy adott enitátshoz tartozo URL lekérdezését végzi.
A paraméterben megadott etitás azonosító alapján kilistázza a teljes URL címeket, minden olyan bejegyzésnél ahol az entitás azonosito megegyezik.
