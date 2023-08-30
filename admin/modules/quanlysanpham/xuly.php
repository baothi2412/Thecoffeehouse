<?php
include('../../config/config.php');
$tensanpham = $_POST['tensanpham'];
$masanpham = $_POST['masanpham'];
$giasanpham = $_POST['giasanpham'];
$soluong = $_POST['soluong'];
$hinhanh= $_FILES['hinhanh']['name'];
$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
$noidung = $_POST['noidung'];
$danhmuc=$_POST['danhmuc'];
//xuly hinh anh

if (isset($_POST['themsanpham'])) {
    $sql_them = " INSERT INTO tbl_sanpham(tensanpham,masanpham,giasanpham,soluong,hinhanh,noidung,id_danhmuc) VALUE('" . $tensanpham . "','" . $masanpham . "','" . $giasanpham . "','" . $soluong . "','" . $hinhanh . "','" . $noidung . "','" . $danhmuc . "')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp,'upload/'.$hinhanh);

 header('Location:../../index.php?action=quanlysanpham&query=them');
} elseif (isset($_POST['suasanpham'])) {

    if($hinhanh!=''){
           move_uploaded_file($hinhanh_tmp,'upload/'.$hinhanh);
           $sql = "SELECT * from tbl_sanpham where id_sanpham='$_GET[idsanpham]'  LIMIT 1";

$query = mysqli_query($mysqli,$sql);
   while($row = mysqli_fetch_array($query)){
    unlink('upload/'.$row['hinhanh']);
   }  
     $sql_update = " UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',hinhanh='" . $hinhanh . "',noidung='" . $noidung . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]' ";

}else{
    $sql_update = " UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "',masanpham='" . $masanpham . "',giasanpham='" . $giasanpham . "',soluong='" . $soluong . "',noidung='" . $noidung . "',id_danhmuc='" . $danhmuc . "' WHERE id_sanpham='$_GET[idsanpham]' ";
}
    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlysanpham&query=them');
} else {

     $id = $_GET['idsanpham'];
    $sql = "SELECT * from tbl_sanpham where id_sanpham= '$id' LIMIT 1";
   $query = mysqli_query($mysqli,$sql);
   while($row = mysqli_fetch_array($query)){
    unlink('upload/'.$row['hinhanh']);
   }
    $sql_xoa = "DELETE from tbl_sanpham where id_sanpham='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysanpham&query=them');
}
?>