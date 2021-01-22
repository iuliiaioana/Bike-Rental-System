<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'functii/sql_functions.php';
session_start();
if (isset($_POST['conectare'])) {
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    $rezbd = conectare($email, $parola);
    if ($rezbd) {
//        conectare cu succes
        if (isset($_SESSION['eroare_login'])) {
            unset($_SESSION['eroare_login']);
//            sterg perechea chei-valoare din sesiune, unde cheia este eroare de_login
        }


        //        setez email e sesiune, atunci cand avem setata cheia email pe $_session, stim ca user este logat
//        ma intereseaza sa stiu cand este userul logat  ca sa [pt sa aleg template ul corect 
        $_SESSION['email'] = $email;
        $_SESSION['id'] = preiaIdDupaEmail($email);
    } else {
        $_SESSION['eroare_login'] = 'Conectare esuata.Parola sau email-ul sunt gresite.';
    }
}

if (isset($_GET['id_produs'])) {
    $id = $_GET['id_produs'];
//    if (isset($_SESSION['cos'][$id])) {
//        $_SESSION['cos'][$id]++;
//        ?><script>window.location.replace("http://localhost/inchiriere_biciclete/index.php?p=6");
                            </script>//<?php
//    } else {
////     nu am produs in cos il adaug cu cantitatea 1
        $_SESSION['cos'][$id] = 1;
//    }
}

if (isset($_GET['id_stergere'])) {
    $id = $_GET['id_stergere'];

    if ($_SESSION['cos'][$id] > 1) {
        $_SESSION['cos'][$id]--;
        ?><script>window.location.replace("http://localhost/inchiriere_biciclete/index.php?p=6");
                            </script><?php
    } else {
        unset($_SESSION['cos'][$id]);
        ?><script>window.location.replace("http://localhost/inchiriere_biciclete/index.php?p=6");
                            </script><?php
    }
}

if (isset($_GET['id_adaugare'])) {

    $id = $_GET['id_adaugare'];
    $_SESSION['cos'][$id]++;
    ?><script>window.location.replace("http://localhost/inchiriere_biciclete/index.php?p=6");
                            </script><?php
}

if (isset($_GET['id_task'])) {
    $id = $_GET['id_task'];
    updateStatus($id);
     ?><script>window.location.replace("http://localhost/inchiriere_biciclete/index.php?p=9");
                            </script>//<?php
}
if (isset($_GET['id_sterg_tranz'])) {
    $id = $_GET['id_sterg_tranz'];
    anulareComanda($id);
    anulareComandaOrderItem($id);
     ?><script>window.location.replace("http://localhost/inchiriere_biciclete/index.php?p=9");
                            </script>//<?php
}

if (isset($_GET['id_produs_sters']) && $_SESSION['email'] == 'admin@admin') {
    $id = $_GET['id_produs_sters'];
    $sterge = stergeProdusDupaId($id);
    if ($sterge) {
        if (isset($_SESSION['stergere_produs'])) {
            unset($_SESSION['stergere_produs']);
        }
//        daca am stergere cu succes scot si din cos;
        unset($_SESSION['cos'][$id]);
    } else {
        $_SESSION['stergere_produs'] = 'Eroare la stergerea produsului.';
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inchiriere biciclete</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>

    <header id="banner"></header>

</head>
<body class="body">
<?php
if (isset($_SESSION['email'])) {
    require_once 'templates/template_conectat.php';
} else {
    require_once 'templates/template_neconectat.php';
}
?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>