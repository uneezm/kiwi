
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adminisztráció | MediPont</title>

    <!-- Közös stíluslap -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    

    <header>
        <a class="brand" href="../../kerdoiv/php/index.php">
            Medi<span>Pont</span>
        </a>

        <span class="muted">
            Online jelentkezés
        </span>
    </header>

    

    <main class="shell">

        <!-- Oldal címe és figyelmeztetés -->
        <section class="hero">

            <h1>Jelentkezések kezelése</h1>

            <p>
                Dolgozói backoffice
            </p>

            <div class="notice">
                Ez a prototípus nyilvánosan megnyitható;
                valódi betegadatokat csak szerveroldali
                jogosultságellenőrzés után szabad megjeleníteni.
            </div>

        </section>

        <!-- ========================================
             3. Statisztikai kártyák
        ======================================== -->

        <div class="stats">

            <!-- Új jelentkezések száma -->
            <div class="stat">
                <span>Új jelentkezés</span>
                <strong id="newCount">0</strong>
            </div>

            <!-- Feldolgozás alatt álló jelentkezések -->
            <div class="stat">
                <span>Feldolgozás alatt</span>
                <strong id="progressCount">0</strong>
            </div>

            <!-- Egyeztetett jelentkezések -->
            <div class="stat">
                <span>Egyeztetve</span>
                <strong id="doneCount">0</strong>
            </div>

        </div>

        <!-- ========================================
             4. Adminisztrációs panel
        ======================================== -->

        <section class="card">

            <!-- Fülek: Jelentkezések / Jogosultságok -->
            <div class="tabs">

                <button class="active" data-tab="applications">
                    Jelentkezések
                </button>

                <button data-tab="permissions">
                    Jogosultságok
                </button>

            </div>

            <!-- ========================================
                 5. Jelentkezések kezelése
            ======================================== -->

            <div id="applications">

                <h2 style="margin-top:22px">
                    Beérkezett jelentkezések
                </h2>

                <!-- Keresés és szűrés -->
                <div class="toolbar">

                    <!-- Keresés név vagy szolgáltatás alapján -->
                    <input
                        id="search"
                        placeholder="Keresés név vagy szolgáltatás alapján"
                        aria-label="Keresés"
                    >

                    <!-- Státusz szerinti szűrés -->
                    <select
                        id="statusFilter"
                        aria-label="Státusz szűrő"
                    >
                        <option value="">Minden státusz</option>
                        <option>Új</option>
                        <option>Feldolgozás alatt</option>
                        <option>Egyeztetve</option>
                    </select>

                    <!-- Sürgősség szerinti szűrés -->
                    <select
                        id="urgencyFilter"
                        aria-label="Sürgősség szűrő"
                    >
                        <option value="">Minden prioritás</option>
                        <option>Sürgős</option>
                        <option>Normál</option>
                    </select>

                </div>

                <!-- ========================================
                     6. Jelentkezések táblázata
                ======================================== -->

                <div class="tablewrap">

                    <table>

                        <!-- Táblázat fejléce -->
                        <thead>
                            <tr>
                                <th>Páciens</th>
                                <th>Szolgáltatás</th>
                                <th>Prioritás</th>
                                <th>Státusz</th>
                                <th>Művelet (demó)</th>
                            </tr>
                        </thead>

                        <!--
                            A táblázat sorait az admin.js
                            render() függvénye hozza létre.
                        -->
                        <tbody id="rows"></tbody>

                    </table>

                </div>

            </div>

            <!-- ========================================
                 7. Jogosultságok fül
            ======================================== -->

            <div
                id="permissions"
                class="hide"
                style="margin-top:22px"
            >

                <h2>Dolgozói szerepkörök</h2>

                <p>
                    <strong>Recepciós:</strong>
                    jelentkezések feldolgozása és kapcsolatfelvétel.
                </p>

                <p>
                    <strong>Orvos:</strong>
                    jogosult egészségügyi adatok megtekintése
                    és szakmai besorolás.
                </p>

                <p>
                    <strong>Admin:</strong>
                    felhasználók és jogosultságok kezelése.
                </p>

                <p class="muted">
                    A szerepkörök érvényesítése későbbi
                    PHP-feladat.
                </p>

            </div>

        </section>

    </main>

    <!-- ========================================
         8. JavaScript betöltése
    ======================================== -->

    <script src="../js/admin.js"></script>

    <!-- ========================================
         9. Lábléc
    ======================================== -->

    <footer>
        Oktatási célú prototípus •
        
    </footer>

</body>
</html>
