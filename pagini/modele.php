

<?php
if (isset($_GET['bucuresti'])) {
    $biciclete = preiaBicicleteCentreKEY('Bucuresti');
} elseif (isset($_GET['brasov'])) 
{
    $biciclete = preiaBicicleteCentreKEY('Brasov');
}
 elseif (isset($_GET['constanta'])) 
{
    $biciclete = preiaBicicleteCentreKEY('Constanta');
}
 elseif (isset($_GET['iasi'])) 
{
    $biciclete = preiaBicicleteCentreKEY('Iasi');
}
 elseif (isset($_GET['toate'])) 
{
    $biciclete = preiaBicicleteCentre();
}
else{
    $biciclete = preiaBicicleteCentre();
}
?>

<div class="row" id="modele">
    <?php
    foreach ($biciclete as $bicileta) {
        ?>

        <div class="col-lg-4">
            <div class="box-element product">
            <img class="thumbnail"  style="width: 200px; align-content: center;" src="imagini/<?php print (!empty($bicileta['image'])) ? $bicileta['image'] : 'no_image.png'; ?>">
            <!--<div class="box-element product">-->
                <h5><strong><?php print $bicileta['product_name'] ?></strong></h5>
                <hr>

                            <!--<button  data-product=<?php print $bicileta['product_id'] ?> data-action="add" class="btn btn-outline-secondary add-btn update-cart">Add to Cart</button>-->
                <h5><b>Locatia: </b><?php
    print $bicileta['city'];
    print " @";
    print $bicileta['shop_name'];
        ?> </h5>
                    <?php if ($_SESSION['email'] == 'admin@admin') { ?>
                    <a class="btn btn-outline-danger" href="index.php?id_produs_sters= <?php print $bicileta['product_id']; ?> "> Sterge produs</a> 
                    <a class="btn btn-outline-info" href="index.php?id_produs_edit=<?php print $bicileta['product_id']; ?>">Editeaza</a>
                    
                <?php } else { ?>
                    <a class="btn btn-outline-info" href="index.php?id_produs= <?php print $bicileta['product_id']; ?>"><b>Rezerva</b> </a>   
                <?php } ?>
                <h4 style="display: inline-block; float: right"><strong><?php print $bicileta['price'] ?> LEI/LUNA </strong></h4>


            </div>
        </div>
    <?php } ?>

</div>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['id_produs_edit'])) {
    // totul e relativ la index

    require_once 'pagini/editeaza_produs.php';
}


    