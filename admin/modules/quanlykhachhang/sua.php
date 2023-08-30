<style>
    /* CSS cho table */
    table {
        width: 50%;
        border-collapse: collapse;
    }
    table td, table th {
        padding: 10px;
        border: 1px solid #ccc;
    }

    /* CSS cho input */
    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* CSS cho nút submit */
    input[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        border: none;
        color: #fff;
        cursor: pointer;
        border-radius: 4px;
    }
</style>

<!-- Đoạn mã template -->
<?php
$sql_sua_khachhang = "SELECT * FROM tbl_dangky WHERE id_dangky = '{$_GET['idkhachhang']}' LIMIT 1";
$query_sua_khachhang = mysqli_query($mysqli, $sql_sua_khachhang);
?>

<p>Sửa thông tin khách hàng</p>
<table>
    <form method="POST" action="modules/quanlykhachhang/xuly.php?idkhachhang=<?php echo $_GET['idkhachhang']; ?>">
        <?php
        while ($dong = mysqli_fetch_array($query_sua_khachhang)) {
        ?>
            <tr>
                <td>Tên khách hàng</td>
                <td><input type="text" name="tenkhachhang" value="<?php echo $dong['tenkhachhang']; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $dong['email']; ?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="diachi" value="<?php echo $dong['diachi']; ?>"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="text" name="matkhau" value="<?php echo $dong['matkhau']; ?>"></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
                <td><input type="text" name="dienthoai" value="<?php echo $dong['dienthoai']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="suakhachhang" value="Sửa thông tin khách hàng"></td>
            </tr>
        <?php
        }
        ?>
    </form>
</table>
