<h1>
    PAGINA CENTRELOR
</h1>


<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h3>
                        Cel mai vandut articol?
                    </h3>
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <?php
                $articol = celMaiVandutArticol();
                ?>
                <img class="thumbnail"  style="width: 200px;" src="imagini/<?php print (!empty($articol['image'])) ? $articol['image'] : 'no_image.png'; ?>">
                <?php
                print '<br> Numele produsului: ';
                print $articol['product_name'];
                ?>
            </div>
        </div>
    </div>




    <div class="card">
        <div class="card-header" id="heading8">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                    <h3>Influenta categoriilor bicicletelor in numarul de inchirieri.</h3>
                </button>
            </h5>
        </div>
        <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
            <div class="card-body">
                <?php
                print "Categorie " . " => " . "NR INCHIRIERI" . "<br>";
                $inchiriere_centre = CategorieProduse();
                foreach ($inchiriere_centre as $b) {
                    print $b['category_name'] . " => " . $b['produse'] . "<br>";
                }
                ?>

                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {
                        packages: ['corechart']
                    });
                </script>

                <div id="container" style="width: 600px; height: 300px; margin: 0 auto"></div>
                <script language="JavaScript">
                    function drawChart() {
                        /* Define the chart to be drawn.*/
                        var data1 = [['Categorie Bicilete', 'Nr de biciclete inchiriate']];
<?php
$inchiriere_centre = CategorieProduse();
foreach ($inchiriere_centre as $b) {
    ?>
                            data1.push(['<?php print $b['category_name']; ?>',<?php print $b['produse']; ?>]);
    <?php
}
?>
                        var data = google.visualization.arrayToDataTable(data1);
                        var options = {
                            title: 'INFLUENTA CATEGORIILOR DE BICICLETE',
                            isStacked: true
                        };
                        /* Instantiate and draw the chart.*/
                        var chart = new google.visualization.BarChart(document.getElementById('container'));
                        chart.draw(data, options);
                    }
                    google.charts.setOnLoadCallback(drawChart);
                </script>

            </div>
        </div>
    </div>





    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h3>
                        Clientii care au facut mai multe tranzactii decat numarul mediu de tranazactii de persoana
                    </h3>
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <!--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.-->
                <table style="width:100%" class="center_div table table-bordered">
                    <tr>

                        <th>Nume Client</th>
                        <th>Nr de tranzactiile ale clientului:</th>

                    </tr>
                    <?php
                    $clientimedii = clientimedii();
                    foreach ($clientimedii as $client) {
                        ?>
                        <tr>
                            <td><?php print $client['nume'] ?></td>
                            <td><?php print $client['tranzactii'] ?></td>

                        </tr>

                    <?php }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h3>
                        TOP 3 clienti fideli
                    </h3>
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <!--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.-->
                <table style="width:100%" class="center_div table table-bordered">
                    <tr>

                        <th>Nume Client</th>
                        <th>Nr de tranzactiile ale clientului:</th>

                    </tr>
                    <?php
                    $clienti = top3clienti();
                    foreach ($clienti as $client) {
                        ?>
                        <tr>
                            <td><?php print $client['nume'] ?></td>
                            <td><?php print $client['tranzactii'] ?></td>

                        </tr>

                    <?php }
                    ?>
                </table>

            </div>
        </div>
    </div>



    <div class="card">
        <div class="card-header" id="headingFour">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <h3>
                        Clienti care si-au ridicat comanda:
                    </h3>
                </button>
            </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
                <!--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.-->
                <table style="width:100%" class="center_div table table-bordered">
                    <tr>

                        <th>Nume Client</th>
                        <th>Tranzactie ID:</th>
                        <th>Data tranzactiei:</th>

                    </tr>
                    <?php
                    $clienti = clientiCuComandaFinalizata();
                    foreach ($clienti as $client) {
                        ?>
                        <tr>
                            <td><?php print $client['nume'] ?></td>
                            <td><?php print $client['transaction_id'] ?></td>
                            <td><?php print $client['date_added'] ?></td>

                        </tr>

                    <?php }
                    ?>
                </table>
            </div>
        </div>
    </div>



    <div class="card">
        <div class="card-header" id="heading5">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    <h3>Clienti care au mai mult de 2 produse comandate la o tranzactie.</h3>
                </button>
            </h5>
        </div>
        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
            <div class="card-body">
                <?php
                print "NUME CLIENT " . " => " . " Numar produse la o tranzactie " . "<br>";
                $clientifaraComanda = clientiProduseTranzactie();
                foreach ($clientifaraComanda as $c) {
                    print $c['nume'] . " => " . $c['numar_produse'] . "<br>";
                }
                ?>
            </div>
        </div>
    </div>




