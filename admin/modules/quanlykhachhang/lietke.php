<?php
$sql_lietke_khachhang = "SELECT * FROM tbl_dangky ORDER BY id_dangky DESC";
$query_lietke_khachhang = mysqli_query($mysqli, $sql_lietke_khachhang);
?>
<p>Liệt kê khách hàng</p>
<style>
        /* CSS cho table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        /* CSS cho tiêu đề */
        h1 {
            text-align: center;
        }

        /* CSS cho nút thao tác */
        .action-button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4CAF50;
            border: none;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        /* CSS cho nút Xóa */
        .delete-button {
            background-color: #f44336;
        }

        /* CSS cho nút Sửa */
        .edit-button {
            background-color: #2196F3;
        }
    </style>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Tên khách hàng</th>
    <th>Email</th>
    <th>Địa chỉ</th>
    <th>Mật khẩu</th>
    <th>Điện thoại</th>
    <th>Thao tác</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_khachhang)) {
    $i++;
  ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['tenkhachhang']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['diachi']; ?></td>
      <td><?php echo $row['matkhau']; ?></td>
      <td><?php echo $row['dienthoai']; ?></td>
      <td>
        <a href="modules/quanlykhachhang/xuly.php?idkhachhang=<?php echo $row['id_dangky']; ?>">Xóa</a> |
        <a href="?action=quanlykhachhang&query=sua&idkhachhang=<?php echo $row['id_dangky']; ?>">Sửa</a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>
