  <?php  if ($_SESSION['email'] == 'admin@admin') { ?>
<?php  ?><script>window.location.replace("http://localhost/inchiriere_biciclete/index.php?p=1");
                            </script>//<?php
  } else{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <style>
            * {
                box-sizing:border-box;
            }

            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }

            .container {
                padding: 64px;
            }

            .row:after {
                content: "";
                display: table;
                clear: both
            }

            .column-66 {
                float: left;
                width: 66.66666%;
                padding: 20px;
            }

            .column-33 {
                float: left;
                width: 33.33333%;
                padding: 20px;
            }

            .large-font {
                font-size: 48px;
            }

            .xlarge-font {
                font-size: 64px
            }

            .button {
                border: none;
                color: black;
                padding: 14px 28px;
                font-size: 16px;
                cursor: pointer;
                background-color: #4CAF50;
            }

            img {
                display: block;
                height: auto;
                max-width: 100%;
            }

            @media screen and (max-width: 1000px) {
                .column-66,
                .column-33 {
                    width: 100%;
                    text-align: center;
                }
                img {
                    margin: auto;
                }
            }
       .btn11 {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 30px 30px;
  cursor: pointer;
  font-size: 40px;
}

/* Darker background on mouse-over */
.btn11:hover {
  background-color: #b3e6b3;
}
        </style>
    </head>
    <body>


        <form>
            <button class="btn" style="width:100%; background-color: #b3e6b3; " href="index.php" name="toate"  ><i class="fa fa-download"></i> <h3> <b>Inchiriaza din toate locatiile </b></h3></button>
 
        <!-- The App Section -->
        <div class="container">
            <div class="row">
                <div class="column-66">

                    <h1 class="xlarge-font"><b>Bucuresti</b></h1>
                    <table style="width:100%">
                        <tr>
                            <th><img width="25" height="30" src="imagini/locations.jpg" ></th>
                            <th><h4 class="large-font" style="color: #b3e6b3;">Strada M. Eminescu</h4></th>
                        </tr>
                    </table>
                    <p><span style="font-size:36px">Relaxare prin Micul Paris.</span> Capitala Romaniei, este unul din cele mai importante si mai vechi orase din Europa, un important centru cultural si istoric dar si economic al Europei de Est. Orasul este modelat dupa mai multe stiluri de arhitectura, trecand prin mai multe perioade istorice, de la regat, la era comunista si apoi moderna. Deoarece in perioada de epoca Fiecare perioada si-a lasat amprenta ei in existenta orasului.
                    </p><form> <button class="button rounded-pill" style="background-color: #b3e6b3;" href="index.php" name="bucuresti">Inchiriaza de la aceasta locatie</button>
                </div>
                <div class="column-33">
                    <img src="imagini/bucuresti.jpg" width="335" height="471">
                </div>
            </div>
        </div>

        <!-- Clarity Section -->
        <div class="container" style="background-color:#f1f1f1">
            <div class="row">
                <div class="column-33">
                    <img src="imagini/brasov.jpg" alt="App" width="435" height="571">
                </div>
                <div class="column-66">
                    <h1 class="xlarge-font"><b>Brasov</b></h1>
                    <table style="width:100%">
                        <tr>
                            <th><img width="25" height="30" src="imagini/locations.jpg" ></th>
                            <th><h4 class="large-font" style="color:#4da6ff;">Strada M. Eminescu</h4></th>
                        </tr></table>

                    <p><span style="font-size:24px">Aerul curat este cu tine.</span>Brașovul este genul acela de oraş de care te îndrăgosteşti la prima vedere. Este imposibil să nu poposeşti aici o dată şi apoi să nu mai revii. Parcă te trage ceva înapoi şi te îmbie să descoperi tot ceea ce acest minunat oraş are de oferit. Numit şi oraşul de la poalele Tâmpei, Braşovul are ceva aparte, ceva care te prinde în mrejele lui şi te face să nu mai vrei să pleci de aici.</p>
                    <button class="button rounded-pill" style="background-color: #4da6ff" href="index.php" name="brasov">Inchiriaza de la aceasta locatie</button>
                </div>
            </div>
        </div>


        <!-- The App Section -->
        <div class="container">
            <div class="row">
                <div class="column-66">
                    <h1 class="xlarge-font"><b>Constanta</b></h1>
                    <table style="width:100%">
                        <tr>
                            <th><img width="25" height="30" src="imagini/locations.jpg" ></th>
                            <th><h4 class="large-font" style="color: #b3e6b3;">Strada M. Eminescu</h4></th>
                        </tr></table>
                    <p><span style="font-size:36px">Simte adierea marii.</span> CONSTANTA este un oras efervescent, ce imbina istoria milenara cu modernismul. Constanta isi primeste oaspetii cu bratele deschise, cu mult farmec si cu locuri surprinzatoare. Este un oras care celebreaza multiculturalismul, un oras in care civilizatia orientala se intalneste si se impleteste cu cea occidentala pentru a genera un spirit spectaculos si plin de viata.</p> 
                    <button class="button rounded-pill" style="background-color: #b3e6b3" href="index.php" name="constanta">Inchiriaza de la aceasta locatie</button>
                </div>
                <div class="column-33">
                    <img src="imagini/constanta.jpg" width="335" height="471" >
                </div>
            </div>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <div class="row">
                <div class="column-33">
                    <img src="imagini/iasi.jpg" alt="App" width="335" height="471">
                </div>
                <div class="column-66">

                    <h1 class="xlarge-font"><b>Iasi</b></h1>
                    <table style="width:100%">
                        <tr>
                            <th><img width="25" height="30" src="imagini/locations.jpg" ></th>
                            <th><h4 class="large-font" style="color:#4da6ff;">Strada M. Eminescu</h4></th>
                        </tr></table>

                    <p><span style="font-size:24px">Relaxare pe coline.</span> Pentru a descoperi toate secretele orașului, te invităm să o faci o plimbare pe străzile încărcate de istorie și farmec: Strada Lăpușneanu, Bulevardul Ștefan cel Mare ori strada Cuza Vodă. Dacă ajungi în inima orașului, chiar unde se întâlnesc aceste artere, vei păși în Piața Unirii, pe locul unde s-a născut România în pași de Hora Unirii a lui Vasile Alecsandri.
                    </p><button class="button rounded-pill" style="background-color: #4da6ff" href="index.php" name="iasi">Inchiriaza de la aceasta locatie</button>
                </div>
            </div>
        </div>
        
        
        <button class="btn" style="width:100%; background-color: #b3e6b3; " href="index.php" name="toate"  ><i class="fa fa-download"></i><h3> <b>Inchiriaza din toate locatiile</b></h3></button></form>
    </body>
</html>





<?php
  }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

