<br><br><br><br>

<div class="container center_div">


    <h1 style="center">Inregistreaza-te acum!</h1>
    <br><br>
    <form method="post" >
        <div class="form-group">
            <label for="nume">Nume:</label>
            <input type="text" class="form-control" name="nume" aria-describedby="emailHelp" placeholder="Numele tau este ...">

        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Emailul tau este ...">
            <small id="emailHelp" class="form-text text-muted">Identificarea clientilor este pe baza de email.</small>
        </div>
        <div class="form-group">
            <label for="parola">Parola:</label>
            <input type="password" class="form-control" name="parola" placeholder="Parola">
        </div>

        
        <button type="submit" class="btn btn-info" name="inregistrare">Inregistreaza-ma!</button></form>
</div>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['inregistrare'])) {
    global $email;
    $email= $_POST['email'];
    $parola = $_POST['parola'];
    $nume = $_POST['nume'];
    if (trim($email) == null || trim($parola) == null) {
        print 'Emailul si parola nu pot fi nule <br>';
        return;
    }
   
    $rezultatInregistrare = inregistrare($nume, $email, $parola);
 
    if ($rezultatInregistrare) {
        // pornim sesiunea direct cand ne inregistram =AUTOLOGIN
        $_SESSION['welcome'] = "Salut, $nume, te-ai inregistrat cu succes.";
        $_SESSION['email'] = $email;
        $_SESSION['id']= preiaIdDupaEmail($email);
        header("location: index.php");
    } else {
        print 'Eroare la inregistrare';
    }
}