<?php
$sql_lietke_sanpham="SELECT * from tbl_danhmuc,tbl_sanpham where tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sanpham= mysqli_query($mysqli,$sql_lietke_sanpham);
 ?>
<p>Liệt kê danh mục sản phẩm</p>
<table style="width:100%" border="1" style="border-collapse: cocollapse">
  <tr>
    <th>Id</th>
    <th>Tên sản phẩm</th>
   <th>Hình ảnh</th>
   <th>Giá</th>
   <th>Số lượng</th>
   <th>Danh mục</th>
   <th>Mã sản phẩm</th>
   <th>Nội dung</th>
   <th>Quản lý</th>
  </tr>
  <?php 
  $i = 0;
  while(
    $row = mysqli_fetch_array($query_lietke_sanpham)){
        $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysanpham/upload/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['giasanpham'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    
    <td><?php echo $row['masanpham'] ?></td>
    <td><?php echo $row['noidung'] ?></td>
  
   <td>
<a href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> | <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham']?>">Sửa</a>

   </td>
    
  </tr>
  <?php 
  }
  ?>
 
</table>