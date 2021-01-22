<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php?p=1">Inchiriaza cu noi!</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
             <li class="nav-item ">
                <a class="nav-link" href="index.php?p=1">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Modele disponibile</a>
            </li>
           
            <?php if ($_SESSION['email'] != 'admin@admin') { ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=3">Locatiile noastre</a>
            </li>
            <?php } if ($_SESSION['email'] == 'admin@admin') { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=4">Adauga bicicleta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=5">Adauga centru inchiriere</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=7">Detalii</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=8">Cautari personalizate</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="index.php?p=9">Confirmare comenzi</a>
                </li>
            <?php } ?>

        </ul>

        <ul class="form-inline my-2 my-lg-0">
            <li class="nav-item active">
                <a class="nav-link bg-dark" style="color: #b3e6b3;"  href="index.php?logout">Logout</a>
            </li>
            <?php if ($_SESSION['email'] != 'admin@admin') { ?>
                <li class="nav-item active">
                    <a class="nav-link  bg-dark" style="color: #b3e6b3;"  href="index.php?p=6">Cos cumparaturi</a>
                </li>
            <?php } ?>

        </ul>


    </div>
</nav>




<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
//         redirect la index, unde o sa verifice daca mai exista sesiune si pt c anu mai exista o sa se incarce in template_neconectat
}


if (isset($_SESSION['welcome'])) {
    print $_SESSION['welcome'];
    unset($_SESSION['welcome']); // ca sa sfisez o singura data prima oara cand ajung in pagina din autologin
}
if (isset($_GET['p'])) {
    $page = $_GET['p'];
    switch ($page) {

        case 1:
            require_once 'pagini/home.php';
            break;
       
        case 4:
            require_once 'pagini/adauga_bicicleta.php';
            break;
        case 5:
            require_once 'pagini/adauga_magazin.php';
            break;
        case 6:
            require_once 'pagini/cos_cumparaturi.php';
            break;
        case 7:
            require_once 'pagini/detalii.php';
            break;
        case 8:
            require_once 'pagini/grafic.php';
            break;
        case 9:
            require_once 'pagini/confirmare.php';
            break;
        case 3:
            require_once 'pagini/locatii.php';
            break;
        case 'thankyou':
            require_once 'pagini/thankyou.php';
            break;
        default: // desi e setata pag nu e o valoare cunoscuta, asa ca incarc pagina de eraore
            require_once 'pagini/eroare.php';
            break;
    }
} else {
    require_once 'pagini/modele.php';
}