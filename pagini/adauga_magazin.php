
<div class="container">
    <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            <form method="post">
                <div class="form-group">
                    <label for="nume_produs">Nume centru inchiriere:</label>
                    <input type="text" class="form-control" name="nume_centru"  placeholder="Nume centru inchiriere">

                </div>
                <div class="form-group">
                    <label for="locatie">Locatia magazinului:</label>
                    <select class="form-control" name="locatie">
                        <option>Bucuresti</option>
                        <option>Constanata</option>
                        <option>Brasov</option>
                        <option>Iasi</option>


                    </select>
                </div>
                <button type="submit" class="btn btn-info" name="adaugare">Adauga centru</button>

            </form></div></div></div>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['adaugare'])) {
    $nume = $_POST['nume_centru'];
    $oras = $_POST['locatie'];
    if (trim($nume) == null) {
        print('Adauga nume pentru centru.');
    } else {
        $rez = adaugarCentru($nume, $oras);
        if ($rez) {
            print('Adaugare centru cu succes.');
        } else {
            print('Nu s-a putut adauga centrul.');
        }
    }
}