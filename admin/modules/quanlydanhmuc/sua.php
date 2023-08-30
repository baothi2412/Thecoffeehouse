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
$sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '{$_GET['iddanhmuc']}' LIMIT 1";
$query_sua_danhmucsp= mysqli_query($mysqli,$sql_sua_danhmucsp);
?>

<p>Sửa danh mục sản phẩm</p>
<table>
    <form method="POST" action="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
        <?php
        while($dong = mysqli_fetch_array($query_sua_danhmucsp)){
        ?>
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" name="tendanhmuc" value="<?php echo $dong['tendanhmuc'] ?>"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" name="thutu" value="<?php echo $dong['thutu'] ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
        </tr>
        <?php } ?>
    </form>
</table>
