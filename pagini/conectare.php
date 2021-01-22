<br><br><br><br>
<form method="POST" class="container center_div">
    <h1>Bine ai revenit!</h1>
    <br><br>
  <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Emailul tau este...">
    <small id="emailHelp" class="form-text text-muted">Identificarea clientilor este pe baza de email.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Parola:</label>
    <input type="password" class="form-control" name="parola" placeholder="Parola">
  </div>
  
 
  <button type="submit" class="btn btn-info" name="conectare">Login</button>
  
  <p> Inca nu ai cont? <a href="index.php?p=2"><b>Apasa aici!</b></a></p>
</form>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_SESSION['eroare_login']))
{
    print $_SESSION['eroare_login'];
}