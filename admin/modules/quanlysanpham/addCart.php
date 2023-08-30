<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    if (isset($_SESSION['cart'][$product_id])) {
        // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $product_image = $_POST['image'];

        $_SESSION['cart'][$product_id] = [
            'product_id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => $quantity,
            'image' => $product_image
        ];
    }

    // Phản hồi thành công về Ajax
    echo "Sản phẩm đã được thêm vào giỏ hàng thành công!";
}
?>
