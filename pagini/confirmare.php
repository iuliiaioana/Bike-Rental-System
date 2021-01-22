<div class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                <h2>
                    Finalizare comenzi. Cand clientul a venit si a ridicat de la sediu, un angajat bifeaza in baza de date ca a terminat comanda.
                </h2>

                <form method="POST">
                    <div class="form-group">
                        <label for="tip">Cauta dupa statusul comenzii:</label>
                        <select class="form-control" name="status">
                            <option>---</option>
                            <option>In asteptare</option>
                            <option>Finalizat</option>


                        </select><br><br>
                        <button type="submit" class="btn btn-info" name="cautare3">Cauta!</button>
                    </div>
                </form>

                <?php
                if (isset($_POST['cautare3'])) {
                    $status = $_POST['status'];

                    if ($status == "---") {
                        $tranzactii = preiaTranzactiiClienti();
                    } else {
                        if ($status == 'In asteptare') {
                            $tranzactii = preiaTranzactiiClientiSTATUS('nu');
                        } else {
                            $tranzactii = preiaTranzactiiClientiSTATUS('da');
                        }
                    }
                } else {
                    $tranzactii = preiaTranzactiiClienti();
                }
                ?>
                <table style="width:100%" class="table table-dark">
                    <tr>
                        <th>Tranzactie ID</th>
                        <th>Nume Client</th>
                        <th>Data comanda</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($tranzactii as $task) {
                        ?>
                        <tr>
                            <td><?php print $task['transaction_id'] ?></td>
                            <td><?php print $task['nume'] ?></td>
                            <td><?php print $task['date_added'] ?></td>

                            <?php if ($task['complete'] == 'da') { ?>
                                <td>Finalizat</td>

                            <?php } else { ?> 
                                <td> In asteptare </td> 

                                <td><a href="index.php?id_task=<?php print $task['transaction_id']; ?>">Confirma predarea comenzii.</a></td>
                                <td><a href="index.php?id_sterg_tranz=<?php print $task['transaction_id']; ?>">Anuleaza comanda.</a></td>
                            <?php } ?>





                        </tr>
                        <?php
                    }
                    ?>

                </table>
       