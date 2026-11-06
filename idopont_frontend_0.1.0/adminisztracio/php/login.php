
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dolgozói bejelentkezés | MediPont</title>

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

    

    <main class="shell" style="max-width:550px">

        <!-- Bejelentkezési kártya -->
        <section class="card">

            <h1>Dolgozói bejelentkezés</h1>

            <p>
                Csak a rendelő munkatársainak.
            </p>

            <!-- ========================================
                 3. Bejelentkezési űrlap
            ======================================== -->

            <form id="loginDemo">

                <!-- E-mail-cím -->
                <div style="margin-bottom:18px">

                    <label for="email">
                        E-mail-cím
                    </label>

                    <input
                        id="email"
                        type="email"
                        required
                        autocomplete="username"
                    >

                </div>

                <!-- Jelszó -->
                <div style="margin-bottom:18px">

                    <label for="password">
                        Jelszó
                    </label>

                    <input
                        id="password"
                        type="password"
                        required
                        autocomplete="current-password"
                    >

                </div>

                <!-- Bejelentkezés gomb -->
                <button class="btn">
                    Bejelentkezés
                </button>

                <!-- JavaScript által megjelenített üzenet -->
                <p id="message" role="alert"></p>

            </form>

            

            <div class="notice">
                Demó: még nincs hitelesítés.
            </div>

            <!-- Adminfelület közvetlen megnyitása -->
            <a href="admin.php">
                Adminfelület megtekintése
            </a>

        </section>

    </main>

    <!-- ========================================
         5. JavaScript – bejelentkezés
    ======================================== -->

    <script>

        // Bejelentkezési űrlap eseménykezelése
        document.querySelector('form').addEventListener(
            'submit',
            e => {

                // Megakadályozza az űrlap elküldését
                e.preventDefault();

                // Tájékoztató üzenet megjelenítése
                document.querySelector('#message').textContent =
                    'A bejelentkezéshez még PHP backend szükséges. ' +
                    'Jelszót nem továbbítunk.';
            }
        );

    </script>

    <!-- ========================================
         6. Lábléc
    ======================================== -->

    <footer>
        Oktatási célú prototípus
    </footer>

</body>
</html>
