<?php
    require 'C:/xampp/htdocs/wp2/vendor/autoload.php';
    use Dompdf\Dompdf;
    use Dompdf\Options;
    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);
    ob_start();
?>
<!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <style>
            body {
                font-family: "DejaVu Sans", "Liberation Sans", "Arial Unicode MS", sans-serif;
            }
            h1 {
                text-align: center;
            }
            .details {
                margin-left: 25px;
            }
            
        </style>
    </head>
    <body>
        <h1>Konvexitás kiválasztása</h1>
        <div>
            <h2>Személyes adatai: </h2>
            <table class="details">
                <tr>
                    <td>Név: </td>
                    <td><?= $_POST['name'] ?? '' ?></td>
                </tr>
                <tr>
                    <td>Születési dátum: </td>
                    <td><?= $_POST['dob'] ?? '' ?></td>
                </tr>
                <tr>
                    <td>TAJ szám: </td>
                    <td><?= $_POST['number'] ?? '' ?></td>
                </tr>
                <tr>
                    <td>Helyszín: </td>
                    <td><?= $_POST['location'] ?? '' ?></td>
                </tr>
            </table>
        </div>
        <div>
            <h2>Állapotfelmérés</h2>
            <table class="details">
                <tr>
                    <td>Sztóma: </td>
                    <td>
                        <?php
                            $stoma = $_POST['stoma'] ?? '';
                            if ($stoma == "prominent") {
                                echo "kiemelkedő";
                            }
                            elseif ($stoma == "inskinlevel") {
                                echo "bőrszintben";
                            }
                            elseif ($stoma == "retracted") {
                                echo "retraktált";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Perisztomális bőr: </td>
                    <td>
                        <?php
                            $skin = $_POST['skin'] ?? '';
                            if ($skin == "intact") {
                                echo "ép";
                            }
                            elseif ($skin == "injured") {
                                echo "sérült";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Has felszíne: </td>
                    <td>
                        <?php
                            $stomach = $_POST['stomach'] ?? '';
                            if ($stomach == "smooth") {
                                echo "sima";
                            }
                            elseif ($stomach == "wrinkled") {
                                echo "redős";
                            }
                            elseif ($stomach == "deep") {
                                echo "mély barázdák";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Hasi tónus: </td>
                    <td>
                        <?php
                            $tone = $_POST['tone'] ?? '';
                            if ($tone == "tight") {
                                echo "feszes";
                            }
                            elseif ($tone == "mixed") {
                                echo "vegyes";
                            }
                            elseif ($tone == "flabby") {
                                echo "petyhüdt";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Testhelyzetben változás: </td>
                    <td>
                        <?php
                            $change = $_POST['change'] ?? '';
                            if ($change == "yes") {
                                echo "igen (ülve/állva romlik)";
                            }
                            elseif ($change == "no") {
                                echo "nem";
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <h2>Konvexitás</h2>
            <table class="details">
                <tr>
                    <td>Kell konvexitás?</td>
                    <td><?= $_POST['convex_yes_no'] ?? '' ?></td>
                </tr>
            </table>
        </div>
        <div>
            <h2>Paraméterek</h2>
            <table class="details">
                <tr>
                    <td>Mélység: </td>
                    <td>
                        <?php
                            $depth = $_POST['depth'] ?? '';
                            if ($depth == "small") {
                                echo "kicsi";
                            }
                            elseif ($depth == "big") {
                                echo "nagy";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Kompresszió: </td>
                    <td>
                        <?php
                            $compression = $_POST['compression'] ?? '';
                            if ($compression == "soft") {
                                echo "puha";
                            }
                            elseif ($compression == "hard") {
                                echo "kemény";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Rugalmasság: </td>
                    <td>
                        <?php
                            $elasticity = $_POST['elasticity'] ?? '';
                            if ($elasticity == "elastic") {
                                echo "rugalmas";
                            }
                            elseif ($elasticity == "stiff") {
                                echo "merevebb";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Feszültség: </td>
                    <td>
                        <?php
                            $pressure = $_POST['pressure'] ?? '';
                            if ($pressure == "near") {
                                echo "közel";
                            }
                            elseif ($pressure == "far") {
                                echo "távol";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Lejtés: </td>
                    <td>
                        <?php
                            $slope = $_POST['slope'] ?? '';
                            if ($slope == "steep") {
                                echo "nagy";
                            }
                            elseif ($slope == "gentle") {
                                echo "kicsi";
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <h2>Gyakori döntési minták</h2>
            <table class="details">
                <tr>
                    <td>Mintája: </td>
                    <td><?= $_POST['sample'] ?? '' ?></td>
                </tr>
                <tr>
                    <td>További megjegyezés: </td>
                    <td><?= $_POST['fournote'] ?? 'nincs' ?></td>
                </tr>
            </table>
        </div>
        <div>
            <h2>Ellenőrzés</h2>
            <table class="details">
                <tr>
                    <td>Van rés a sztóma körül? </td>
                    <td>
                        <?php
                            $gap = $_POST['gap'] ?? '';
                            if ($gap == "yes") {
                                echo "igen";
                            }
                            elseif ($gap == "no") {
                                echo "nem";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Van szivárgás? </td>
                    <td>
                        <?php
                            $leak = $_POST['leak'] ?? '';
                            if ($leak == "yes") {
                                echo "igen";
                            }
                            elseif ($leak == "no") {
                                echo "nem";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Van bőrfájdalom/nyomás? </td>
                    <td>
                        <?php
                            $pain = $_POST['pain'] ?? '';
                            if ($pain == "yes") {
                                echo "igen";
                            }
                            elseif ($pain == "no") {
                                echo "nem";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Sztómája jobban kiemelkedik? </td>
                    <td>
                        <?php
                            $prominent = $_POST['prominent'] ?? '';
                            if ($prominent == "yes") {
                                echo "igen";
                            }
                            elseif ($prominent == "no") {
                                echo "nem";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Redők kisimultak? </td>
                    <td>
                        <?php
                            $pleats = $_POST['pleats'] ?? '';
                            if ($pleats == "yes") {
                                echo "igen";
                            }
                            elseif ($pleats == "no") {
                                echo "nem";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>További megjegyezés: </td>
                    <td><?= $_POST['fivenote'] ?? 'Nincs' ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>
<?php
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4','portrait');
    $dompdf->render();
    $dompdf->stream("kerdoiv.pdf",["Attachment"=>false]);
?>