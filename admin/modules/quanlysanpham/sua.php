<?php
$sql_sua_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '{$_GET['idsanpham']}' LIMIT 1";
$query_sua_sanpham= mysqli_query($mysqli,$sql_sua_sanpham);
 ?>
  <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
        }

        input[type="text"], textarea, select {
            width: 98%;
        }
    </style>
<p>Sửa sản phẩm</p>
<table border="1" width="100%" style="border-collapse:collapse;">
        <?php
        while($row = mysqli_fetch_array($query_sua_sanpham)){ ?>
            <form method="POST" enctype="multipart/form-data" action="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">

        <tr>

            <td>Tên sản phẩm</td>
            <td><input type="text" value="<?php echo $row['tensanpham'] ?>"name="tensanpham" style="width: 98%;"></td>

        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" value="<?php echo $row['masanpham'] ?>" name="masanpham" style="width: 98%;"></td>

        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" value="<?php echo $row['giasanpham'] ?>" name="giasanpham" style="width: 98%;"></td>

        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong" style="width: 98%;"></td>

        </tr> 
         <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinhanh" style="width: 98%;">
            <img src="modules/quanlysanpham/upload/<?php echo $row['hinhanh'] ?>" width="150px">

        </td>

        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows="10"  name="noidung" style="width: 98%;"><?php echo $row['noidung'] ?></textarea></td>
        </tr>
       
        <tr>
    <td>Danh mục sản phẩm</td>
    <td>
        <select name="danhmuc">
            <?php 
            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
                ?>
                <option selected value="<?php echo $row_danhmuc['id_danhmuc']; ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
            }else{
                ?>
  <option value="<?php echo $row_danhmuc['id_danhmuc']; ?>"><?php echo $row_danhmuc['tendanhmuc']; ?></option>

                <?php 
            }}
            ?>
        </select>
    </td>
</tr> 
<tr>
            <td><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>

        </tr>
    </form>
    <?php }?>
</table>
