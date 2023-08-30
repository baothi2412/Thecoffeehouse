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
<table>
    <form method="POST" action="modules/quanlydanhmuc/xuly.php">
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" name="tendanhmuc"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" name="thutu"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
        </tr>
    </form>
</table>
