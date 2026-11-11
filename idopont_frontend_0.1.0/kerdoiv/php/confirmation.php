<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Visszaigazolás | MediPont</title>

    <!-- Közös stíluslap betöltése -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    

    <header>

        <!-- MediPont logó -->
        <a class="brand" href="../../kerdoiv/php/index.php">
            Medi<span>Pont</span>
        </a>

        <span class="muted">
            Online jelentkezés
        </span>

    </header>

    <!-- ========================================
         2. Fő tartalom
    ======================================== -->

    <main class="shell">

        <!-- Visszaigazoló kártya -->
        <section class="card">

            <h1>Visszaigazolás</h1>

            <!-- Tájékoztatás a prototípus állapotáról -->
            <div class="notice">
                A visszaigazoló oldal előkészítve.
                Valódi sikeres beküldést csak a későbbi
                PHP backend és adatbázismentés igazolhat.
            </div>

            <!-- A végleges rendszer működésének leírása -->
            <p>
                A végleges rendszer itt jelzi majd,
                hogy a rendelő fogadta a jelentkezést,
                és munkatársai kapcsolatba lépnek
                a pácienssel.
            </p>

            <!-- Visszalépés a kérdőívhez -->
            <a class="btn" href="index.php">
                Vissza a kérdőívhez
            </a>

        </section>

    </main>

    

    <footer>
        Oktatási célú prototípus
    </footer>

</body>
</html>
