<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idProdus = $_GET['id_produs_edit'];
$produs = preiaBicicletaDupaID($idProdus);
?>
<!--html-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            <form method="post"  enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php print $produs['product_id']; ?>"/>
                <table>
                    <tr>
                        <td>
                            <label for="denumire">Denumire</label>
                        </td>
                        <td>
                            <input type="text" name="denumire" id="denumire" value="<?php print $produs['product_name']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pret">Pret</label>
                        </td>
                        <td>
                            <input type="text" name="pret" id="pret" value="<?php print $produs['price']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img width="200px" src="imagini/<?php print (!empty($produs['image'])) ? $produs['image'] : 'no_img.jpg'; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Imagine</td>
                        <td>
                            <input type="file" class="btn btn-info"  name="img"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="edit" class="btn btn-info" value="Editeaza"/>
                        </td>
                    </tr>
                </table>
            </form></div></div></div>
<?php
if (isset($_POST['edit'])) {
    $denumire = $_POST['denumire'];
    $pret = $_POST['pret'];
    $id = $_POST['id'];
    if (isset($_FILES['img'])) {
        if ($_FILES['img']['error'] == 0) {
            switch ($_FILES['img']['type']) {
                case 'image/jpg':
                case 'image/jpeg':
                case 'image/png':
                case 'image/bmp':
                case 'image/gif':
                    $numeImagine = uniqid() . $_FILES['img']['name'];
                    $salvareServer = move_uploaded_file($_FILES['img']['tmp_name'], 'imagini/' . $numeImagine);
                    if ($salvareServer) {
                        $actulizareBd = actualizeazaProdus($id, $denumire, $pret, $numeImagine);
                        if ($actulizareBd) {
                            // header('location: index.php'); 
                            ?><script>window.location.replace("http://localhost/inchiriere_biciclete/index.php");
                            </script><?php
                        } else {
                            print 'Eroare la salvarea in baza de date';
                        }
                    } else {
                        print "Eroare la salvarea pe server";
                    }

                    break;

                default:
                    print 'Fisierul selectat nu are un format acceptat';
                    break;
            }
        } else if ($_FILES['img']['error'] == 4) {
            $actualizareBD = actualizeazaProdus($id, $denumire, $pret, NULL);
            if ($actualizareBD) {
                ?><script>window.location.replace("http://localhost/inchiriere_biciclete/index.php");
                </script><?php
            } else {
                print 'Eroare la salvarea in baza de date';
            }
        } else {
            print 'Eroare la salvarea fisierului';
        }
    }
}