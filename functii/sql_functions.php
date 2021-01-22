<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function conectareBd(
        $host = 'localhost',
        $user = 'root',
        $password = 'sudo',
        $database = 'bicicleta'
) {
    return mysqli_connect($host, $user, $password, $database);
}

function preiaUtilizatoriDupaEmail($email) {
    $link = conectareBd();
    $query = "SELECT * FROM customer WHERE  email ='$email'  ";

    $result = mysqli_query($link, $query);

    $utilizator = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $utilizator;
}

function preiaIdDupaEmail($nume) {
    $link = conectareBd();
    $query = "SELECT id_user FROM customer where email='$nume'";
    $result = mysqli_query($link, $query);

    $id = mysqli_fetch_row($result);
    return $id[0];
}

function inregistrare($nume, $email, $parola) {
    $link = conectareBd();
    $parola = md5($parola);

    $user = preiaUtilizatoriDupaEmail($email);


    if ($user) {
        return false;
    } else {
        $query = "INSERT INTO customer VALUES (NULL, '$nume','$email','$parola')";
//   var_dump($query); die();
    }
    return mysqli_query($link, $query);
}

function preiaUtilizatori() {
    $link = conectareBd();
    $query = "SELECT id_user, email FROM customer";

    $result = mysqli_query($link, $query);
    $utilizatori = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $utilizatori;
}

function conectare($email, $parola) {
    $link = conectareBd();



    $user = preiaUtilizatoriDupaEmail($email);
    if ($user) {
        if (md5($parola) == $user['parola']) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}

function adaugarCentru($nume, $oras) {
    $link = conectareBd();
    $query = "INSERT INTO rental_shop VALUES (NULL, '$nume','$oras')";
    return mysqli_query($link, $query);
}

function preiaCentre() {
    $link = conectareBd();
    $query = "SELECT * FROM rental_shop";
    $result = mysqli_query($link, $query);

    $centre = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $centre;
}

function preiaCategorie() {
    $link = conectareBd();
    $query = "SELECT * FROM category";
    $result = mysqli_query($link, $query);

    $categorii = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $categorii;
}

function preiaIdDupaNume($nume) {
    $link = conectareBd();
    $query = "SELECT shop_id FROM rental_shop where shop_name='$nume'";
    $result = mysqli_query($link, $query);

    $id = mysqli_fetch_row($result);
    return $id[0];
}

function preiaIDdupaCategorie($nume) {
    $link = conectareBd();
    $query = "SELECT category_id FROM category where category_name='$nume'";
    $result = mysqli_query($link, $query);

    $id = mysqli_fetch_row($result);
    return $id[0];
}

function adaugaBicicleta($nume_bicla, $shop_name, $price, $type, $image) {
    $link = conectareBd();
    $shop_id = preiaIdDupaNume($shop_name);
    $tip = preiaIDdupaCategorie($type);
    $query = "INSERT INTO product values(NULL,'$nume_bicla', $shop_id, $price ,$tip ,'$image')";
    return mysqli_query($link, $query);
}

function preiaBiciclete() {
    $link = conectareBd();
    $query = "SELECT * FROM product";
    $result = mysqli_query($link, $query);

    $bicilete = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $bicilete;
}

function preiaBicicletaDupaID($id) {
    $link = conectareBd();

    $query = "select * from product where product_id=$id";

    $result = mysqli_query($link, $query);

    $produs = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // var_dump($produs);
    return $produs;
}

function preiaBicicleteCentre() {
    $link = conectareBd();
    $query = "select p.product_id,p.product_name, p.price,p.image, p.shop_id, r.shop_name, r.city from product p join rental_shop r on p.shop_id=r.shop_id";
    $result = mysqli_query($link, $query);

    $bicilete = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $bicilete;
}
function preiaBicicleteCentreKEY($key) {
    $link = conectareBd();
    $query = "select p.product_id,p.product_name, p.price,p.image, p.shop_id, r.shop_name, r.city from product p join rental_shop r on p.shop_id=r.shop_id where r.city='$key'";
    $result = mysqli_query($link, $query);

    $bicilete = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $bicilete;
}

function adaugaComanda($total) {
    $link = conectareBd();
    $id = $_SESSION['id'];
    $date = date("Y-m-d");
    $query = "INSERT INTO order1 values(null, $id , '$date', 'nu',$total)";
    return mysqli_query($link, $query);
}

function preiaComanda() {
    $link = conectareBd();
    $query = "SELECT  transaction_id FROM order1 ORDER BY transaction_id DESC limit 1";
    $result = mysqli_query($link, $query);
    $id = mysqli_fetch_row($result);
    return $id[0];
}

function adauagaComandaProduct($product_id, $cantitate) {
    $link = conectareBd();

    $transaction_id = preiaComanda();

    $query = "INSERT INTO order_item values($product_id,$transaction_id, $cantitate)";
    return mysqli_query($link, $query);
}

function preiaTranzactii() {
    $link = conectareBd();
    $query = "select * from order1";
    $rez = mysqli_query($link, $query);
    $comenzi = mysqli_fetch_all($rez, MYSQLI_ASSOC);
    return $comenzi;
}

function preiaTranzactiiClienti() {
    $link = conectareBd();
    $query = "select o.transaction_id, c.nume , o.date_added, o.complete from order1 o join customer c on o.customer_id=c.id_user";
    $rez = mysqli_query($link, $query);
    $comenzi = mysqli_fetch_all($rez, MYSQLI_ASSOC);
    return $comenzi;
}

function preiaTranzactiiClientiSTATUS($status) {
    $link = conectareBd();
    $query = "select o.transaction_id, c.nume , o.date_added, o.complete from order1 o 
        join customer c on o.customer_id=c.id_user 
        where complete='$status' ";

    $rez = mysqli_query($link, $query);
    $comenzi = mysqli_fetch_all($rez, MYSQLI_ASSOC);
    return $comenzi;
}

function updateStatus($id) {
    $link = conectareBD();
    $query = "Update order1 set complete='da' where transaction_id=$id";
    return mysqli_query($link, $query);
}

function anulareComandaOrderItem($id) {
    $link = conectareBD();
    $query = "delete from order_item where transaction_id=$id";
    return mysqli_query($link, $query);
}

function anulareComanda($id) {
    $link = conectareBD();
    $query = "delete from order1 where transaction_id=$id";
    return mysqli_query($link, $query);
}

function preiaNumeClientDupaID($id) {
    $link = conectareBd();
    $query = "SELECT nume FROM customer where id_user='$id'";
    $result = mysqli_query($link, $query);

    $nume = mysqli_fetch_row($result);
    return $nume[0];
}

function celMaiVandutArticol() {
    $link = conectareBd();
    $query = "select p.product_name, p.product_id ,p.image  from product p 
where p.product_id in (select product_id from order_item
group by product_id
order by count(product_id) desc
) and p.product_id in (select p.product_id from product p)
limit 1;";
    $result = mysqli_query($link, $query);

    $nume = mysqli_fetch_array($result);
    return $nume;
}

function clientimedii() {
    $link = conectareBd();
    $query = "select o.customer_id, c.nume, count(o.transaction_id) as tranzactii from order1 o join customer c on o.customer_id=c.id_user
group by o.customer_id
having count(o.transaction_id) > (select round(avg(tranzactii)) as tranzatii_medii_persoana from
(select count(oo.transaction_id)  as tranzactii,oo.customer_id from order1  oo  
								group by (oo.customer_id)) as tran)";
    $result = mysqli_query($link, $query);

    $magazin = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $magazin;
}

function top3clienti() {
    $link = conectareBd();
    $query = "select o.customer_id, c.nume, count(o.transaction_id) as tranzactii from order1 o join customer c on o.customer_id=c.id_user
group by o.customer_id
order by count(o.transaction_id) desc
limit 3;";
    $result = mysqli_query($link, $query);

    $clienti = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $clienti;
}

function clientiProduseTranzactie() {
    $link = conectareBd();
    $query = "select distinct c.nume , 
        (select count(o2.product_id) from order_item o2 where o2.transaction_id=o.transaction_id group by o2.transaction_id) as numar_produse 
        from customer c join order1 o on c.id_user =o.customer_id 
        having numar_produse >2";
    $result = mysqli_query($link, $query);

    $clienti = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $clienti;
}

function clientiCuComandaFinalizata() {
    $link = conectareBd();
    $query = "select c.nume, o.transaction_id, o.date_added from order1 o join customer c on o.customer_id=c.id_user
where complete='da'
order by o.date_added asc";
    $result = mysqli_query($link, $query);

    $clienti = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $clienti;
}

function OraseBicicleteInchiriate() {
    $link = conectareBd();
    $query = "select r.city, count(oi.product_id) as produse from order1 o 
        join order_item oi on o.transaction_id=oi.transaction_id 
        join product p on oi.product_id=p.product_id 
        join rental_shop r on r.shop_id=p.shop_id
        group by r.city";
    $result = mysqli_query($link, $query);

    $biciclete = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $biciclete;
}

function OraseBicicleteInchiriateKEY($oras) {
    $link = conectareBd();
    $query = "select r.city, count(oi.product_id) as produse from order1 o
        join order_item oi on o.transaction_id=oi.transaction_id 
        join product p on oi.product_id=p.product_id 
        join rental_shop r on r.shop_id=p.shop_id
        where r.city='$oras'
        group by r.city";
    $result = mysqli_query($link, $query);

    $biciclete = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $biciclete;
}

function InchiriereDupaLuni($key) {
    $link = conectareBd();
    $query = "select  DISTINCT c.nume, c.email from customer c join order1 o on c.id_user=o.customer_id
where o.transaction_id in (select oi.transaction_id from order_item oi where oi.months=$key)";
    $result = mysqli_query($link, $query);

    $inchirieri = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $inchirieri;
}

function CategorieProduse() {
    $link = conectareBd();
    $query = "select c.category_name , count(oi.product_id) as produse from order1 o 
       join order_item oi on o.transaction_id=oi.transaction_id
       join product p on oi.product_id=p.product_id 
        join category c on c.category_id=p.category_id
        group by c.category_id";
    $result = mysqli_query($link, $query);

    $inchirieri = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $inchirieri;
}

function BaniPeLuna() {
    $link = conectareBd();
    $query = "select monthname(date_added) AS Month,sum(value_transaction) as Money  from order1
group by MONTH(date_added)";
    $result = mysqli_query($link, $query);

    $inchirieri = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $inchirieri;
}
function BaniPeLunaoras($key) {
    $link = conectareBd();
    $query = "select monthname(o.date_added) as Month , sum(p.price*oi.months) as Money from order1 o join order_item oi on o.transaction_id=oi.transaction_id
join product p on p.product_id=oi.product_id join rental_shop r on r.shop_id=p.shop_id
where r.city='$key'
group by MONTH(o.date_added)
order by (select monthname(oo.date_added) from order1 oo where oo.transaction_id= o.transaction_id) desc";
    $result = mysqli_query($link, $query);

    $inchirieri = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $inchirieri;
}


function InchiriereMedie() {
    $link = conectareBd();
    $query = " select date_added AS ZI , round(AVG(value_transaction),2) as Money   from order1
        group by date_added";
    $result = mysqli_query($link, $query);

    $inchirieri = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $inchirieri;
}

function InchiriereMedieZI($day) {
    $link = conectareBd();
    $query = "select date_added AS ZI , ROUND(AVG(value_transaction),2) as Money  from order1
        where date_added='$day'
        group by date_added ";
    $result = mysqli_query($link, $query);

    $inchirieri = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $inchirieri;
}

function actualizeazaProdus($id, $denumire, $pret, $imagine) {
    $link = conectareBd();

    if (!empty($imagine)) {
        $query = "UPDATE product SET product_name = '$denumire', price = $pret, image = '$imagine' WHERE product_id = $id";
    } else {
        $query = "UPDATE product SET product_name = '$denumire', price = $pret WHERE product_id = $id";
    }

    return mysqli_query($link, $query);
}

function stergeProdusDupaId($id) {
    $link = conectareBd();
    $query = "delete from product where product_id=$id";
    return mysqli_query($link, $query);
}
