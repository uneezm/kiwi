# MediPont – Frontend prototípus (0.1.0)

Online betegfelvételi és időpontkérő rendszer, a mellékelt frontend terv, funkcionális specifikáció és rendszerterv alapján.

## Indítás MAMP/XAMPP alatt
1. Másold az `idopont_frontend_0.1.0` mappát a MAMP `htdocs` vagy XAMPP `htdocs` mappájába.
2. Indítsd el az Apache webszervert.
3. Nyisd meg a megfelelő helyi URL-t, például `http://localhost:8888/idopont_frontend_0.1.0/kerdoiv/php/index.php` (MAMP alapértelmezett port esetén).
4. Dolgozói felület: `/idopont_frontend_0.1.0/adminisztracio/php/login.php`; admin-demó: `/idopont_frontend_0.1.0/adminisztracio/php/admin.php`.

## Fontos
- A frontend demó: **nem küld be, nem ment és nem tölt fel valódi adatot**.
- Az adminfelület kizárólag fiktív, böngészőben tárolás nélküli mintadatokat használ; nincs beléptetés.
- A `confirmation.php` oldal csak előkészített helyőrző.
- PHP API, jogosultságkezelés, adatbázis, dokumentumfeltöltés, valódi adatkezelési tájékoztató és PDF-visszaigazolás későbbi feladat.
- **Valódi páciensadatot ne használj a demóban.**
- A szolgáltatáslista szemléltető példa, később adatbázisból érkezhet.

## Kanban javaslat
Testing: páciensűrlap reszponzivitása, mezőellenőrzés, feltételes mezők, admin szűrés és demó státuszváltoztatás.
To Do: PHP API, adatbázis, valódi bejelentkezés, szerveroldali validáció, feltöltés, adatvédelmi tájékoztató, visszaigazolás.
