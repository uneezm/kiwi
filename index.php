<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Beküldött adatok:</h2><pre>";
        print_r($_POST);
        echo "</pre><hr>";
    }
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Konvexitás kiválasztása</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
    </head>
    <body>
        <h1 id="title">Konvexitás kiválasztása – Klinikai döntési kérdőív</h1>
        <form method="POST">
            <section class="details rows">
                <h2 class="startpoint">Személyes adatai:</h2>
                <div class="personaldetails">
                    <label for="name">Név: </label>
                    <input type="text" id="name" name="name" maxlength="50">
                    <label for="dob">Születési dátum: </label>
                    <input type="date" id="dob" name="dob">
                    <label for="number">TAJ-szám: </label>
                    <input type="text" id="number" name="number" maxlength="9">
                    <label for="location">Helyszín (opcionális): </label>
                    <input type="text" id="location" name="location">
                </div>
            </section>
            <section class="rows">
                <h2 class="firststep">1. lépés - Gyors állapotfelmérés</h2>
                <div class="grid">
                    <div class="firstcard">
                        <div class="firstsubject">
                            <h3>Sztóma</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="stoma" value="prominent" onclick="yourStoma()"> Kiemelkedő</label>
                            <label><input type="radio" name="stoma" value="inskinlevel" onclick="yourStoma()"> Bőrszintben</label>
                            <label><input type="radio" name="stoma" value="retracted" onclick="yourStoma()"> Retraktált</label>
                        </div>
                    </div>
                    <div class="firstcard">
                        <div class="firstsubject">
                            <h3>Perisztomális bőr</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="skin" value="intact" onclick="yourStoma()"> Ép</label>
                            <label><input type="radio" name="skin" value="injured" onclick="yourStoma()"> Irritált / sérült</label>
                        </div>
                    </div>
                    <div class="firstcard">
                        <div class="firstsubject">
                            <h3>Has felszíne</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="stomach" value="smooth" onclick="yourStoma()"> Sima</label>
                            <label><input type="radio" name="stomach" value="wrinkled" onclick="yourStoma()"> Redős</label>
                            <label><input type="radio" name="stomach" value="deep" onclick="yourStoma()"> Mély barázdák</label>
                        </div>
                    </div>
                    <div class="firstcard">
                        <div class="firstsubject">
                            <h3>Hasi tónus</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="tone" value="tight" onclick="yourStoma()"> Feszes</label>
                            <label><input type="radio" name="tone" value="mixed" onclick="yourStoma()"> Vegyes</label>
                            <label><input type="radio" name="tone" value="flabby" onclick="yourStoma()"> Petyhüdt</label>
                        </div>
                    </div>
                    <div class="firstcard">
                        <div class="firstsubject">
                            <h3>Testhelyzetben valamilyen változás?</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="change" value="yes" onclick="yourStoma()"> Igen (ülve/állva romlik)</label>
                            <label><input type="radio" name="change" value="no" onclick="yourStoma()"> Nem</label>
                        </div>
                    </div>
                </div>
            </section>
            <section class="rows">
                <h2 class="secondstep">2. lépés - Szükséges konvexitás?</h2>
                <div class="secondcard">
                    <div class="radio-group">
                        <label><input type="radio" name="convex_yes_no" value="yes" onclick="toggleConvex(true)">Igen</label>
                        <label><input type="radio" name="convex_yes_no" value="no" onclick="toggleConvex(false)">Nem</label>
                    </div>
                        <!-- IGEN eset -->
                    <div id="convex-yes" class="hidden">
                        <hr>
                        <h3>Válassz okokat:</h3>
                        <label><input type="checkbox" name="reason[]" value="not_rising"> Sztóma nem emelkedik ki</label>
                        <label><input type="checkbox" name="reason[]" value="leaking"> Szivárgás van</label>
                        <label><input type="checkbox" name="reason[]" value="folds"> Redők / bemélyedések</label>
                        <label><input type="checkbox" name="reason[]" value="skinproblem"> Bőrprobléma</label>
                    </div>
                    <!-- NEM eset -->
                    <div id="convex-no" class="hidden">
                        <hr>
                        <h3>Indok:</h3>
                        <label><input type="radio" name="no_reason" value="good_stoma"> Jól kiemelkedő sztóma + sík bőr + jó zárás</label>
                    </div>
                </div>
            </section>
            <section class="rows">
                <h2 class="thirdstep">3. lépés - Paraméterek</h2>
                <div class="grid">
                    <div class="thirdcard">
                        <div class="thirdsubject">
                            <h3>Mélység</h3>
                            <p>A domb csúcsa és az alap közötti távolság.</p>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="depth" value="small"> Kicsi <br>(sekély rédő)</label>
                            <label><input type="radio" name="depth" value="big"> Nagy <br>(mély barázda/retrakció)</label>
                        </div>
                    </div>
                    <div class="thirdcard">
                        <div class="thirdsubject">
                            <h3>Kompresszibilitás</h3>
                            <p>Mennyire lapitható a konvex rész.</p>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="compression" value="soft"> Puha <br>(avagy könnyen összenyomható)</label>
                            <label><input type="radio" name="compression" value="hard"> Kemény <br>(avagy kevésbé összenyomható)</label>
                        </div>
                    </div>
                    <div class="thirdcard">
                        <div class="thirdsubject">
                            <h3>Rugalmasság</h3>
                            <p>Mennyire hajlítható a bőrvédő.</p>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="elasticity" value="elastic"> Rugalmas <br>(mély redők/egyenetlen felszín)</label>
                            <label><input type="radio" name="elasticity" value="stiff"> Merevebb <br>(sima/petyhüdt bőr)</label>
                        </div>
                    </div>
                    <div class="thirdcard">
                        <div class="thirdsubject">
                            <h3>Feszültség helye</h3>
                            <p>A pont, ahol a konvex nyomást gyakorol.</p>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="pressure" value="near"> Közel <br>(sztóma kiemelése)</label>
                            <label><input type="radio" name="pressure" value="far"> Távol <br>(redők kisimítása)</label>
                        </div>
                    </div>
                    <div class="thirdcard">
                        <div class="thirdsubject">
                            <h3>Lejtés</h3>
                            <p>A domb szöge az alaptól a csúcsig.</p>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="slope" value="steep"> Nagy <br>(stabilitás, kiemelés)</label>
                            <label><input type="radio" name="slope" value="gentle"> Kicsi <br>(redők kisimitása)</label>
                        </div>
                    </div>
                </div>
            </section>
            <section class="rows">
                <h2 class="fourthstep">4. lépés - Gyakori döntési minták</h2>
                <div class="grid">
                    <div class="fourthcard">
                        <div class="fourthsubject">
                            <h3>1. Feszes has + lapos sztóma</h3>
                        </div>
                        <hr>
                        <ul>
                            <li>Mélység: közepes–nagy</li>
                            <li>Kompresszibilitás: puha</li>
                            <li>Rugalmasság: kevésbé fontos</li>
                            <li>Feszültség: közel</li>
                            <li>Lejtés: nagy</li>
                        </ul>
                        <div class="choice">
                            <p class="goal"><b>Cél:</b> sztóma kiemelése</p>
                            <input type="radio" name="sample" value="tight_flat">
                        </div>
                    </div>
                    <div class="fourthcard">
                        <div class="fourthsubject">
                            <h3>2. Petyhüdt has + redők</h3>
                        </div>
                        <hr>
                        <ul>
                            <li>Mélység: kisebb</li>
                            <li>Kompresszibilitás: keményebb</li>
                            <li>Rugalmasság: kevésbé rugalmas</li>
                            <li>Feszültség: távol</li>
                            <li>Lejtés: kisebb</li>
                        </ul>
                        <div class="choice">
                            <p class="goal"><b>Cél:</b> felszín kisimítása</p>
                            <input type="radio" name="sample" value="flabby_wrinkled">
                        </div>
                    </div>
                    <div class="fourthcard">
                        <div class="fourthsubject">
                            <h3>3. Vegyes (leggyakoribb)</h3>
                        </div>
                        <hr>
                        <ul>
                            <li>Mélység: változó</li>
                            <li>Kompresszibilitás: közepes/puha</li>
                            <li>Rugalmasság: rugalmas</li>
                            <li>Feszültség: inkább közel</li>
                            <li>Lejtés: közepes</li>
                        </ul>
                        <div class="choice">
                            <p class="goal"><b>Cél:</b> adaptív illeszkedés</p>
                            <input type="radio" name="sample" value="mixed">
                        </div>
                    </div>
                </div>
                <div class="fourthnote">
                    <label for="note"> Megjegyzések:</label>
                    <textarea type="text" name="fournote" id="note"></textarea>
                </div>
            </section>
            <section class="rows">
                <h2 class="fifthstep">5. lépés - Ellenőrzés</h2>
                <div class="grid">
                    <div class="fifthcard">
                        <div class="fifthsubject">
                            <h3>Van rés a sztóma körül?</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="gap" value="yes"> Igen</label>
                            <label><input type="radio" name="gap" value="no"> Nem</label>
                        </div>
                    </div>
                    <div class="fifthcard">
                        <div class="fifthsubject">
                            <h3>Van szivárgás?</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="leak" value="yes"> Igen</label>
                            <label><input type="radio" name="leak" value="no"> Nem</label>
                        </div>
                    </div>
                    <div class="fifthcard">
                        <div class="fifthsubject">
                            <h3>Van bőrfájdalom/nyomás?</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="pain" value="yes"> Igen</label>
                            <label><input type="radio" name="pain" value="mild"> Enyhe</label>
                            <label><input type="radio" name="pain" value="no"> Nem</label>
                        </div>
                    </div>
                    <div class="fifthcard">
                        <div class="fifthsubject">
                            <h3>Sztómája jobban kiemelkedik?</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="prominent" value="yes"> Igen</label>
                            <label><input type="radio" name="prominent" value="no"> Nem</label>
                        </div>
                    </div>
                    <div class="fifthcard">
                        <div class="fifthsubject">
                            <h3>Redők kisimultak?</h3>
                        </div>
                        <hr>
                        <div class="decide">
                            <label><input type="radio" name="pleats" value="yes"> Igen</label>
                            <label><input type="radio" name="pleats" value="no"> Nem</label>
                        </div>
                    </div>
                </div>
                <div class="fifthnote">
                    <label for="note"> Megjegyzések: </label>
                    <textarea type="text" name="fivenote" id="note"></textarea>
                </div>
            </section>
            <div class="sections rows">
                <div class="mistakes">
                    <h3>Gyakori hibák</h3>
                    <hr>
                    <div class="happenings">
                        <ul>
                            <li>Túl nagy mélység &#8594; nyomási sérülés</li>
                            <li>Túl puha rendszer petyhüdt hason &#8594; szivárgás</li>
                            <li>Feszültség rossz helyen &#8594; hatástalan</li>
                            <li>Csak fekve történő felmérés</li>
                        </ul>
                    </div>
                </div>
                <div class="goldenrule">
                    <h3>Aranyszabály</h3>
                    <hr>
                    <p>A konvexitás célja: <b>kiemelni</b> vagy <b>kisimítani</b>.</p>
                    <div class="grid">
                        <div class="explanations">
                            <h3>Kiemelni: </h3>
                            <ul>
                                <li>Nagyobb lejtés</li>
                                <li>Feszültség közel a sztómához</li>
                            </ul>
                        </div>
                        <div>
                            <h3>Kisimítani: </h3>
                            <ul>
                                <li>Kisebb lejtés</li>
                                <li>Feszültség távol a sztómától</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="buttons rows">
                <button class="savebutton" type="submit" formaction="public/pdfconvert.php">Mentés (PDF-ben)</button>
                <button class="resetbutton" type="reset">Űrlap törlése</button>
                <button class="checkbutton" type="submit">Ellenőrzés/Összegzés megjelenítése</button>
            </div>
            <div class="credits rows">
                <hr>
                <p>2026 Mészáros Levente</p>
            </div>
        </form>
    </body>
</html>