<?php 
if (isset($_GET['quanly'])){
    $tam=$_GET['quanly'];
}else{
    $tam='';
}
if($tam=='shop'){
    include("shop.php");

}elseif
   ( $tam=='about'){
    include("about.php");
   }elseif($tam=='shopping-cart'){
    include("shoppping-cart.php");
   }
   elseif($tam=='contact'){
    include("contact.php");
   } elseif($tam=='dangky'){
        include("dangky.php");
   }else{
    include("index.php");
   }
   ?>