<div class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                <form method="POST">
                    <div class="form-group">
                        <label for="tip">Alege orasul dupa care doresti sa cauti:</label>
                        <select class="form-control" name="oras">
                            <option>-Toate orasele-</option>
                            <option>Bucuresti</option>
                            <option>Brasov</option>
                            <option>Iasi</option>
                            <option>Constanta</option>

                        </select><br><br>
                        <button type="submit" class="btn btn-info" name="cautare5">Cauta!</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['cautare5'])) {
                    $oras = $_POST['oras'];
                    if ($oras == '-Toate orasele-') {
                        $bani_luna = BaniPeLuna();
                    } else {
                        print "<h2>Orasul selectat este: " . $oras . "</h2>";
                        $bani_luna = BaniPeLunaoras($oras);
                    }
                } else {
                    $bani_luna = BaniPeLuna();
                }

                print "LUNA" . " => " . "BANI" . "<br>";
                foreach ($bani_luna as $b) {
                    print $b['Month'] . " => " . $b['Money'] . "Lei<br>";
                }
                ?>

                <div id="piechart"></div>

                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {'packages': ['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {

                        var arr3 = [['Task', 'Hours per Day']
                        ];
<?php
foreach ($bani_luna as $b) {
    ?>
                            arr3.push(['<?php print $b['Month']; ?>',<?php print $b['Money']; ?>]);
    <?php
}
?>
                        var data = google.visualization.arrayToDataTable(arr3);

                        // Optional; add a title and set the width and height of the chart
                        var options = {'title': 'Evolutia pe lunii a inchirierilor', 'width': 600, 'height': 540};

                        // Display the chart inside the <div> element with id="piechart"
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                    }
                </script>
            </div>            </div>            </div>            </div>           






<div class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                <h2>Numele si emailul clientilor care au inchiat un nr dat de luni</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="tip">Alege numarul de luni dupa care doresti sa cauti:</label>
                        <input type="number"  name="luni_cautare"><br><br>
                        <button type="submit" class="btn btn-info" name="cautare11">Cauta!</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['cautare11'])) {
                    $luni = $_POST['luni_cautare'];
                    $inchiriere = InchiriereDupaLuni($luni);
                    if (empty($inchiriere)) {
                        print 'Nu exista inchirieri pe ' . $luni . ' luni.';
                    } else {
                        print '<h2>Clientii care au inchiriat pe ' . $luni . ' luni:</h2>';
                        print "NUME CLIENT " . " => " . " EMAIL " . "<br>";
                        $inchiriere = InchiriereDupaLuni($luni);
                        foreach ($inchiriere as $b) {
                            print $b['nume'] . " => " . $b['email'] . "<br>";
                        }
                    }
                } else {
                    print 'Te rugam sa adaugi o valoare';
                }
                ?>
            </div>
        </div>
    </div>


    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">    

                    
                                    <h3>Valoarea medie de vanzare pe zi.</h3>
                             
                                <form method="POST">
                                    <div class="form-group">

                                        <label for="zi">Alege ziua in care doresti sa verifici tranzactia medie:</label>
                                        <input type="date" id="zi" name="zi"><br><br>

                                        <button type="submit" class="btn btn-info" name="cautare2">Cauta!</button>
                                    </div>
                                </form>
                                <?php
                                if (isset($_POST['cautare2'])) {
                                    $zi = $_POST['zi'];
                                    $mediu = InchiriereMedieZI($zi);
                                    if ($mediu == NULL) {
                                        print '<b>Nu exista tranzactii in ziua aleasa</b>';
                                    } else {
                                        print 'Valoarea medie in ziua <b>'.$zi.'</b> de <b>' . $mediu['Money'] . '</b> lei.';
                                    }
                                } else {
                                    print 'Adaugati data pe care doriti sa verificati';
                                }

                                print "<br>Zilele disponibile cu tranzactii sunt:";
                                print "<br>ZI " . " => " . " BANI " . "<br>";
                                $mediu_lista = InchiriereMedie();
                                foreach ($mediu_lista as $b) {
                                    print $b['ZI'] . " => " . $b['Money'] . "<br>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="pb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                                    <h2>Numar de biciclete inchiriate in functie de oras</h2>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="tip">Alege orasul dupa care doresti sa cauti:</label>
                                            <select class="form-control" name="oras">
                                                <option>-Toate orasele-</option>
                                                <option>Bucuresti</option>
                                                <option>Brasov</option>
                                                <option>Iasi</option>
                                                <option>Constanta</option>

                                            </select><br><br>
                                            <button type="submit" class="btn btn-info" name="cautare1">Cauta!</button>
                                        </div>
                                    </form>
                                    <?php
                                    print "NUME ORAS " . " => " . " NUMAR BICICLETE " . "<br>";
                                    if (isset($_POST['cautare1'])) {
                                        $oras = $_POST['oras'];
                                        if ($oras == '-Toate orasele-') {
                                            $bicle = OraseBicicleteInchiriate();
                                        } else {
                                            print "<h2>Orasul selectat este: " . $oras . "</h2>";
                                            $bicle = OraseBicicleteInchiriateKEY($oras);
                                        }
                                    } else {
                                        $bicle = OraseBicicleteInchiriate();
                                    }

                                    foreach ($bicle as $b) {
                                        print $b['city'] . " => " . $b['produse'] . "<br>";
                                    }
                                    ?>
                                </div>
                            </div>


