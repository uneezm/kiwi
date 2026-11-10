
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Betegfelvétel | MediPont</title>

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

        <!-- Bemutatkozó szakasz -->
        <section class="hero">

            <h1>Jelentkezés magánrendelésre</h1>

            <p>
                Töltse ki az adatfelvételi kérdőívet.
                Munkatársaink később felveszik Önnel a kapcsolatot
                időpont-egyeztetés céljából.
            </p>

            <div class="notice">
                A beküldés még
                nem továbbít adatokat a rendelőnek.
            </div>

        </section>

        <!-- ========================================
             3. Betegfelvételi űrlap
        ======================================== -->

        <form id="patientForm" name="patientForm" action="./validation.php" method="post" target="_blank" autocomplete="off" novalidate>

            <!-- ========================================
                 4. Személyes adatok
            ======================================== -->

            <section class="card">

                <h2>1. Személyes adatok</h2>

                <div class="grid">

                    <!-- Teljes név -->
                    <div>
                        <label for="fullName">Teljes név *</label>
                        <input
                            id="fullName"
                            name="fullName"
                            required
                            maxlength="100"
                            autocomplete="name"
                        >
                    </div>

                    <!-- Anyja neve -->
                    <div>
                        <label for="motherName">Anyja neve *</label>
                        <input
                            id="motherName"
                            name="motherName"
                            required
                            maxlength="100"
                        >
                    </div>

                    <!-- Születési dátum -->
                    <div>
                        <label for="birthDate">Születési dátum *</label>
                        <input
                            type="date"
                            id="birthDate"
                            name="birthDate"
                            required
                        >
                    </div>

                    <!-- Születési hely -->
                    <div>
                        <label for="birthPlace">Születési hely *</label>
                        <input
                            id="birthPlace"
                            name="birthPlace"
                            required
                        >
                    </div>

                    <!-- TAJ-szám -->
                    <div>
                        <label for="taj">TAJ-szám *</label>
                        <input
                            id="taj"
                            name="taj"
                            inputmode="numeric"
                            maxlength="9"
                            pattern="[0-9]{9}"
                            required
                            placeholder="9 számjegy"
                        >
                    </div>

                    <!-- E-mail-cím -->
                    <div>
                        <label for="email">E-mail-cím *</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            autocomplete="email"
                        >
                    </div>

                    <!-- Telefonszám -->
                    <div>
                        <label for="phone">Telefonszám *</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            required
                            placeholder="+36 30 123 4567"
                        >
                    </div>

                    <!-- Lakcím -->
                    <div>
                        <label for="address">Lakcím</label>
                        <input
                            id="address"
                            name="address"
                            autocomplete="street-address"
                        >
                    </div>

                    <!-- Tartózkodási hely -->
                    <div>
                        <label for="temporaryAddress">
                            Tartózkodási hely
                        </label>
                        <input
                            id="temporaryAddress"
                            name="temporaryAddress"
                        >
                    </div>

                    <!-- Adóazonosító jel -->
                    <div>
                        <label for="taxNumber">
                            Adóazonosító jel (opcionális)
                        </label>
                        <input
                            id="taxNumber"
                            name="taxNumber"
                            inputmode="numeric"
                            maxlength="10"
                        >
                    </div>

                    <!-- Visszatérő páciens -->
                    <div class="full">

                        <label>Visszatérő páciens?</label>

                        <div class="choices">

                            <label>
                                <input
                                    type="radio"
                                    name="returning"
                                    value="yes"
                                >
                                Igen
                            </label>

                            <label>
                                <input
                                    type="radio"
                                    name="returning"
                                    value="no"
                                    checked
                                >
                                Nem
                            </label>

                        </div>

                    </div>

                </div>

            </section>

            <!-- ========================================
                 5. Jelentkezés adatai
            ======================================== -->

            <section class="card">

                <h2>2. Jelentkezés adatai</h2>

                <div class="grid">

                    <!-- Kívánt szolgáltatás -->
                    <div>
                        <label for="service">
                            Kívánt szolgáltatás *
                        </label>

                        <select
                            id="service"
                            name="service"
                            required
                        >
                            <option value="">Válasszon...</option>
                            <option>Állapotfelmérés</option>
                            <option>Fogászati konzultáció</option>
                            <option>Röntgen</option>
                            <option>Fogtömés</option>
                            <option>Egyéb</option>
                        </select>
                    </div>

                    <!-- Sürgősség -->
                    <div>

                        <label>
                            Sürgős eset? *
                        </label>

                        <div class="choices">

                            <label>
                                <input
                                    type="radio"
                                    name="urgent"
                                    value="yes"
                                    required
                                >
                                Igen
                            </label>

                            <label>
                                <input
                                    type="radio"
                                    name="urgent"
                                    value="no"
                                >
                                Nem
                            </label>

                        </div>

                    </div>

                    <!-- Sürgősség indoklása -->
                    <div
                        class="full hide"
                        id="urgentDetailWrap"
                    >

                        <label for="urgentDetail">
                            Rövid indoklás *
                        </label>

                        <textarea
                            id="urgentDetail"
                            name="urgentDetail"
                            maxlength="500"
                        ></textarea>

                        <p class="muted">
                            A sürgősségi megjelölés nem jelent
                            azonnali orvosi ellátást.
                        </p>

                    </div>

                    <!-- Jelentkezés indoka -->
                    <div class="full">

                        <label for="reason">
                            Jelentkezés indoka, panaszok *
                        </label>

                        <textarea
                            id="reason"
                            name="reason"
                            required
                            maxlength="1500"
                        ></textarea>

                    </div>

                    <!-- Megfelelő napszakok -->
                    <div class="full">

                        <label>Megfelelő napszakok</label>

                        <div class="choices">

                            <label>
                                <input
                                    type="checkbox"
                                    name="times"
                                    value="morning"
                                >
                                Délelőtt
                            </label>

                            <label>
                                <input
                                    type="checkbox"
                                    name="times"
                                    value="afternoon"
                                >
                                Délután
                            </label>

                            <label>
                                <input
                                    type="checkbox"
                                    name="times"
                                    value="evening"
                                >
                                Este
                            </label>

                        </div>

                    </div>

                    <!-- Egyéb időpontkérések -->
                    <div class="full">

                        <label for="availability">
                            Egyéb időpontkérések
                        </label>

                        <textarea
                            id="availability"
                            name="availability"
                            placeholder="Például: hétfő és szerda megfelelő"
                        ></textarea>

                    </div>

                </div>

            </section>

            <!-- ========================================
                 6. Általános állapotfelmérés
            ======================================== -->

            <section class="card">

                <h2>3. Általános állapotfelmérés</h2>

                <div class="grid">

                    <!-- Allergia -->
                    <div class="full">

                        <label>Van ismert allergiája?</label>

                        <div class="choices">

                            <label>
                                <input
                                    type="radio"
                                    name="allergy"
                                    value="yes"
                                >
                                Igen
                            </label>

                            <label>
                                <input
                                    type="radio"
                                    name="allergy"
                                    value="no"
                                    checked
                                >
                                Nem
                            </label>

                        </div>

                        <!-- Allergia részletezése -->
                        <div
                            id="allergyDetailWrap"
                            class="hide"
                        >

                            <label for="allergyDetail">
                                Mire allergiás?
                            </label>

                            <input
                                id="allergyDetail"
                                name="allergyDetail"
                            >

                        </div>

                    </div>

                    <!-- Gyógyszerszedés -->
                    <div class="full">

                        <label>
                            Szed rendszeresen gyógyszert?
                        </label>

                        <div class="choices">

                            <label>
                                <input
                                    type="radio"
                                    name="medication"
                                    value="yes"
                                >
                                Igen
                            </label>

                            <label>
                                <input
                                    type="radio"
                                    name="medication"
                                    value="no"
                                    checked
                                >
                                Nem
                            </label>

                        </div>

                        <!-- Gyógyszerszedés részletezése -->
                        <div
                            id="medicationDetailWrap"
                            class="hide"
                        >

                            <label for="medicationDetail">
                                Milyen gyógyszert?
                            </label>

                            <input
                                id="medicationDetail"
                                name="medicationDetail"
                            >

                        </div>

                    </div>

                    <!-- Gyógyszerérzékenység -->
                    <div class="full">

                        <label>
                            Van ismert gyógyszerérzékenysége?
                        </label>

                        <div class="choices">

                            <label>
                                <input
                                    type="radio"
                                    name="sensitivity"
                                    value="yes"
                                >
                                Igen
                            </label>

                            <label>
                                <input
                                    type="radio"
                                    name="sensitivity"
                                    value="no"
                                    checked
                                >
                                Nem
                            </label>

                        </div>

                        <!-- Gyógyszerérzékenység részletezése -->
                        <div
                            id="sensitivityDetailWrap"
                            class="hide"
                        >

                            <label for="sensitivityDetail">
                                Melyik gyógyszerre?
                            </label>

                            <input
                                id="sensitivityDetail"
                                name="sensitivityDetail"
                            >

                        </div>

                    </div>

                    <!-- Egyéb megjegyzések -->
                    <div class="full">

                        <label for="notes">
                            Egyéb fontos megjegyzések
                        </label>

                        <textarea
                            id="notes"
                            name="notes"
                        ></textarea>

                    </div>

                </div>

            </section>

            <!-- ========================================
                 7. Dokumentumok és nyilatkozat
            ======================================== -->

            <section class="card">

                <h2>4. Dokumentumok és nyilatkozat</h2>

                <!-- Dokumentumfeltöltés -->
                <label for="documents">
                    Leletek feltöltése (opcionális)
                </label>

                <input
                    type="file"
                    id="documents"
                    name="documents[]"
                    multiple
                    accept=".pdf,.jpg,.jpeg,.png"
                >

                <p class="muted">
                    PDF, JPG vagy PNG •
                    legfeljebb 5 MB fájlonként •
                    demóban nincs feltöltés
                </p>

                <!-- Adatkezelési nyilatkozat -->
                <div class="choices">

                    <label>

                        <input
                            type="checkbox"
                            id="privacy"
                            required
                        >

                        Elolvastam a
                        <a href="#privacyInfo">
                            prototípus adatkezelési tájékoztatását
                        </a>,
                        és tudomásul veszem, hogy ez a demó
                        nem fogad valódi jelentkezéseket. *

                    </label>

                </div>

                <!-- Adatkezelési tájékoztatás -->
                <p
                    id="privacyInfo"
                    class="muted"
                >
                    A végleges alkalmazáshoz a rendelő saját,
                    jogilag ellenőrzött adatkezelési tájékoztatója
                    szükséges. Ez a prototípus nem tárol
                    beküldött adatokat.
                </p>

                <!-- Űrlapellenőrzés visszajelzése -->
                <div
                    id="formMessage"
                    role="alert"
                    aria-live="polite"
                ></div>

                <!-- Űrlapgombok -->
                <div class="actions">

                    <button
                        class="btn"
                        type="submit"
                    >
                        Űrlap ellenőrzése (demó)
                    </button>

                    <button
                        class="btn secondary"
                        type="reset"
                    >
                        Törlés
                    </button>

                </div>

            </section>

        </form>

    </main>

    <!-- ========================================
         8. JavaScript betöltése
    ======================================== -->

  <!--  <script src="../js/form.js"></script>
-->
    

    <footer>
        Oktatási célú prototípus
    </footer>

</body>
</html>
