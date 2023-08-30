<?php
include('../../config/config.php');
$tenkhachhang = $_POST['tenkhachhang'];
$email = $_POST['email'];
$diachi = $_POST['diachi'];
$matkhau = $_POST['matkhau'];
$dienthoai = $_POST['dienthoai'];

if (isset($_POST['themkhachhang'])) {
    $sql_them = " INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')";
    mysqli_query($mysqli, $sql_them);
    header('Location:../../index.php?action=quanlykhachhang&query=them');
} elseif (isset($_POST['suakhachhang'])) {
    $sql_update = "UPDATE tbl_dangky SET tenkhachhang='".$tenkhachhang."', email='".$email."', diachi='".$diachi."', matkhau='".$matkhau."', dienthoai='".$dienthoai."' WHERE id_dangky='$_GET[idkhachhang]'";

    mysqli_query($mysqli, $sql_update);
    header('Location:../../index.php?action=quanlykhachhang&query=them');
} else {
    $id = $_GET['idkhachhang'];
    $sql_xoa = "DELETE from tbl_dangky where id_dangky='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlykhachhang&query=them');
}
?>