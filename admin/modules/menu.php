


<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>
        /* CSS để tạo giao diện menu */
        ul.admincp_list {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        ul.admincp_list li {
            display: inline-block;
            margin-right: 10px;
        }
        ul.admincp_list li a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 5px;
        }
        ul.admincp_list li a:hover {
            background-color: green;
            color: #fff;
        }
    </style>
</head>
<body>
    <ul class="admincp_list">
        <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
        <li><a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a></li>
        <li><a href="index.php?action=quanlykhachhang&query=them">Quản lý tài khoản khách hàng</a></li>
    </ul>
</body>
</html>
