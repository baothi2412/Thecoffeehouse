<div class="clear"></div>
<div class="main">
    <?php 
    if(isset($_GET['action']) && isset($_GET['query']))
    {
        $tam = $_GET['action'];
       $query = $_GET['query'];
    }else{
        $tam='';
        $query='';
    }
    if(
        $tam=='quanlydanhmucsanpham'&& $query=='them'){
        include("modules/quanlydanhmuc/them.php");
        include("modules/quanlydanhmuc/lietke.php");

    }else if($tam=='quanlydanhmucsanpham'  && $query=='sua'){
        include("modules/quanlydanhmuc/sua.php");
    }else if($tam=='quanlysanpham'  && $query=='them'){
        include("modules/quanlysanpham/them.php");
        include("modules/quanlysanpham/lietke.php");
    }else if($tam=='quanlysanpham'  && $query=='sua'){
        include("modules/quanlysanpham/sua.php");
    }
else if($tam=='quanlykhachhang'  && $query=='them'){
    include("modules/quanlykhachhang/them.php");
    include("modules/quanlykhachhang/lietke.php");
}else if($tam=='quanlykhachhang'  && $query=='sua'){
    include("modules/quanlykhachhang/sua.php");
}else{
        include("modules/dashboard.php");
    }
    ?>
</div>