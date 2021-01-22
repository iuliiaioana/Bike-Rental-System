



<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">Inchiriaza cu noi!</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
<!--            <li class="nav-item">
                <a class="nav-link" href="index.php?p=1">Modele disponibile</a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=4">Locatiile noastre</a>


            </li>

        </ul>

        <ul class="form-inline my-2 my-lg-0">
            <li class="nav-item">
                <a class="nav-link mr-sm-2" href="index.php?p=2" name="inregistrare" style="color: #b3e6b3;"><b>Inregistrare</b> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link my-2 my-sm-0" href="index.php?p=3" name="conectare" style="color: #b3e6b3;"><b>Conectare</b></a>
            </li>

        </ul>


    </div>
</nav>



<?php
if (isset($_GET['p'])) {
    $page = $_GET['p'];
    switch ($page) {

        case 1:
            require_once 'pagini/modele.php';
            break;
        case 2:
            require_once 'pagini/inregistrare.php';
            break;
        case 3:
            require_once 'pagini/conectare.php';
            break;
        case 4:
            require_once 'pagini/locatii.php';
            break;

        default: // desi e setata pag nu e o valoare cunoscuta, asa ca incarc pagina de eraore
            require_once 'pagini/eroare.php';
            break;
    }
} else {
    require_once 'pagini/home.php';
}