<?php
$centre = preiaCentre();

$categorii = preiaCategorie();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nume_produs">Nume bicicleta:</label>
                    <input type="text" class="form-control" name="nume_produs"  placeholder="Nume produs">

                </div>
                <div class="form-group">
                    <label for="magazin">Magazinul unde se listeaza bicicleta:</label>
                    <select class="form-control" name="magazin">
                        <?php
                        foreach ($centre as $centru) {
                            ?>
                            <option><?php print $centru['shop_name'] ?></option>

                        <?php } ?>
                    </select>
                </div>

                <label for="pret">Pretul de inchiriere:</label>
                <input type="number"  name="pret" >

                <div class="form-group">
                    <label for="tip">Categorie:</label>
                    <select class="form-control" name="tip">
                        <?php
                        foreach ($categorii as $categorie) {
                            ?>


                            <option><?php print $categorie['category_name'] ?></option>

                        <?php } ?>


                    </select>
                </div>

                <div class="form-group">
                    <label for="img">Adauga imagine produsului:</label>
                    <input type="file" id="img" name="img">
                </div>

                <button type="submit" class="btn btn-info" name="adaugare">Adauga bicicleta</button>
            </form>
        </div>
    </div></div>

<?php
$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['adaugare'])) {
    $nume = $_POST['nume_produs'];
    $magazin = $_POST['magazin'];
    $pret = $_POST['pret'];
    $tip = $_POST['tip'];


    if (isset($_FILES['img'])) {
//        verificam daca exista vreo eroare
        if ($_FILES['img']['error'] == 0) {
//             nu avem eroare-> adaugam produsu
//            verificam tipul fisierului jpg,jpeg,bmp,gif
            switch ($_FILES['img']['type']) {
                case 'image/jpg':
                case 'image/jpeg':
                case 'image/png':
                case 'image/bmp':
                case 'image/gif':

//                    $_files['img']['name'] nume imagine din pc_user.jpg
//                    ne asiguram ca imaginea are un nume unic si sa pastram extensia
//                     sa vedem daca are id unic
                    $numeImagine = uniqid() . $_FILES['img']['name'];
//                     numele va fi ceva de genul 1w1e32e2 nume_imagine_.jpg
//                     fisierul si calea unde vreau sa l mut 
                    $salvareServer = move_uploaded_file($_FILES['img']['tmp_name'], 'imagini/' . $numeImagine);
                    if ($salvareServer) {


                        $salvareBD = adaugaBicicleta($nume, $magazin, $pret, $tip, $numeImagine);

                        if ($salvareBD) {
                            print 'Produs adaugat cu succes.';
                        } else {
//                            nu l am salvat in bd deci il sterg si de pe server
                            unlink('imagini/' . $numeImagine);
                            print 'Eroare la salvarea in baza de date.';
                        }
                    } else {
                        print 'Eroare de server';
                    }



                    break;
                default:
                    print 'Fisierul selectat nu are un format acceptat';
                    break;
            }
        } else {
//             daca am 4 sa adaug dar fara imagine
            if ($_FILES['img']['error'] == 4) {
//                 adaugam produsul chiar daca nu are imagine
                $rezultatAdaugareProdus = adaugaBicicleta($nume, $magazin, $pret, $tip, NULL);
                if ($rezultatAdaugareProdus == True) {
                    print 'Produs adaugat cu succes.';
                } else {
                    print 'eroare la salvarea in baza de date.';
                }
            } else {
                print 'a aparut o eroare: ' . $phpFileUploadErrors[$_FILES['img']['error']];
            }
        }
    }
}