<div class="container">
    <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            <h1>Comanda in procesare. Veti primi un email cand puteti veni la magazin sa  o ridicati.</h1>
            <form>
                <table>
                    <tr>
                        <td><img style="width: 400px;" src="imagini/giphy.gif"></td></tr>
                    <tr><td><button type="submit" style="width: 400px;" class="btn btn-info rounded-pill" name="finalizare">Inapoi la site!</button></td>
                    </tr></table>
            </form>
        </div></div></div>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$cos = $_SESSION['cos'];

$total_plata = $_SESSION['total'];
$p = adaugaComanda($total_plata);
if ($p) {
    print 'Adaugare succes in order<br>';
} else {
    print 'Nu s a adaugat in order';
}

foreach ($cos as $idProdus => $cantitate) {
    $produs = preiaBicicletaDupaID($idProdus);
    $product_id = $produs['product_id'];


    $rez = adauagaComandaProduct($product_id, $cantitate);
    if ($rez) {
        print 'Adaugare cu succes in order_item <br>';
        unset($_SESSION['cos']); //golesc cosul dupa o plasare corecta a comenzii.
        unset($_SESSION['total']);
    } else {
        print ' Eroare la adaugare.Reincearca comanda.';
    }
}


if (isset($_GET['finalizare'])) {
    header('location: ../index.php');
}
