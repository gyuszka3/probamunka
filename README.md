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
