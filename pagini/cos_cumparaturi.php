

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

print '<br><br>';
if (empty($_SESSION['cos'])) {
    ?> <div class="center_div"> <?php print '<h1>Cosul este gol.</h1>'; ?> </div> <?php
} else {
    ?>



    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Denumire</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Pret</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Luni inchiriere</div>
                                    </th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$total = 0;

foreach ($_SESSION['cos'] as $idProdus => $cantitate) {

    $produs = preiaBicicletaDupaID($idProdus);

    $total += $produs['price'] * $cantitate;
    ?>
                                <tr>
                                    <th scope="row">
                                        <div class="p-2">
                                          
                                            <img src="imagini/<?php print (!empty($produs['image'])) ? $produs['image'] : 'no_image.png'; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"><a href="#" class="text-dark d-inline-block"><?php print $produs['product_name']; ?></a></h5><span class="text-muted font-weight-normal font-italic"></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="align-middle"><strong><?php print $produs['price']; ?></strong></td>
                                    <td class="align-middle"><strong> <a href="index.php?page=6&id_adaugare=<?php print $idProdus; ?>"> <b><button type="button" class="btn btn-success">+</button></b> </a>
                                            <?php print $cantitate; ?>

                                            <a href="index.php?page=6&id_stergere=<?php print $idProdus; ?>"> <button type="button" class="btn btn-danger">-</button> </a></strong></td>
                                <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                        </tbody>
                          <?php
            }
            $_SESSION['total'] = $total;
            ?>

                    </table>
                </div>
                <!-- End -->
            </div>
        </div>
             <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted"></strong>
            <h3 class="font-weight-bold"><?php print 'Pret total: ' . $total . 'LEI.' ?></h3>
        </li>
       
        <a class="btn btn-dark rounded-pill py-2 btn-block"  href="index.php?p=thankyou"><b><h2>Finalizare comanda!</h2></b></a>
    </div>
</div>
   <?php }
?>
</div>

</div>
</div>
</div>

