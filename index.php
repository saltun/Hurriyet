<?php 
include "Hurriyet.php";

// Sınıfın başlagıcında api key bilginizi veriniz 

$h=new Hurriyet(KEY_BİLGİNİZ);





// Yazıları listeler ( 3 parametre alır dökümana bakınız. )

//$h->listArticle();



// Yazıyı id değerine göre getirir 

//$h->getArticle('40262101');


// Tüm köşe yazarlarını içeriklerini listeler ( 3 parametre alır dökümana bakınız. )

//$h->getColumnists();

// Sabit Köşe yazarının içeriklerini listeler.

//$h->getColumnist('40262192');


var_dump($h->getData());


