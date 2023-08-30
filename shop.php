<?php 
include "admin/config/config.php";
?>
 <?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

?>

<!doctype php>
<php class="no-js" lang="en">
<style>
    .menu1 li{
        font-size: 20px;
    }
   
    
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>The Coffee House</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/lycf.jpg">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet"> 
    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="css/plugins.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernizer JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<!-- Main Wrapper Start -->
<div id="main-wrapper" class="section">
    <!-- Header Section Start -->
    <div class="header-section section">
       
        <!-- Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <!-- Header Top Wrapper Start -->
                        <div class="header-top-wrapper">
                            <div class="row">

                                <!-- Header Social -->
                                <div class="header-social col-md-4 col-12">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                </div>

                                <!-- Header Logo -->
                                <div class="header-logo col-md-4 col-12">
                                    <a href="index.php" class="logo"><img src="img/logo.png" alt="logo"></a>
                                </div>

                                <!-- Account Menu -->
                                <div class="account-menu col-md-4 col-12">
                                    <ul>
                                    <li>
                                                    <a href="dangky.php">Đăng nhập
                                                        <?php
                                                      
                                                        if (isset($_SESSION['tenkhachhang'])) {
                                                            // Hiển thị tên người dùng
                                                             $_SESSION['tenkhachhang'] . '</p>';
                                                        }
                                                        ?>
                                                    </a>
                                                    <?php
                                                    if (isset($_SESSION['dangky'])) {
                                                        echo $_SESSION['dangky'];
                                                        unset($_SESSION['dangky']); // Xóa session 'dangky' sau khi hiển thị
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($_SESSION['login'])) {
                                                        echo $_SESSION['login'];
                                                        if (isset($_SESSION['tenkhachhang'])) {
                                                            echo $_SESSION['tenkhachhang']; // Hiển thị biến $tenkhachhang
                                                        }
                                                        unset($_SESSION['login']); // Xóa session 'login' sau khi hiển thị
                                                    }
                                                    ?>
                                                </li>
                                        <li><a href="shopping-cart.php">Shopping Cart</a></li>
                                        <li><a href="#" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i><span class="num"></span></a>
                                            
                                            <!-- Mini Cart -->
                                            <div  class="mini-cart-brief dropdown-menu text-left">
                                                <!-- Cart Products -->
                                                <div class="all-cart-product clearfix">
                                                <?php
session_start();


if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    if (isset($_GET['remove']) && isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng hay không
        if (isset($cart[$product_id])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$product_id]);

            // Cập nhật lại session với giỏ hàng đã xóa
            $_SESSION['cart'] = $cart;

            // Chuyển hướng về trang giỏ hàng sau khi xóa thành công
            
          
        }
    }
    ?>

    <div id="cart-content" class="cart-content">
        <?php foreach ($cart as $product_id => $product) { ?>
            <div class="single-cart clearfix">
                <div class="cart-image">
                    <!-- Hiển thị hình ảnh sản phẩm -->
                    <a href="product-details.php"><img src="<?php echo $product['image']; ?>" alt=""></a>
                </div>
                <div class="cart-info">
                    <h5><a href="product-details.php"><?php echo $product['name']; ?></a></h5>
                    <p><?php echo $product['price']; ?></p>
                    <span><?php echo $product['quantity']; ?></span>
                    <a href="shop.php?remove=true&product_id=<?php echo $product_id; ?>" class="cart-delete" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                  
                </div>
            </div>
        <?php } ?>
    </div>

<?php
} else {
    echo "Giỏ hàng trống";
}
?>




                                                   
                                                </div>
                                                <!-- Cart Total -->
                                               
                                                <!-- Cart Button -->
                                                <div class="cart-bottom  clearfix">
                                                    <a href="cart.php">Check out</a>
                                                </div>
                                            </div>
                                            
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div><!-- Header Top Wrapper End -->

                    </div>
                </div>
            </div>
        </div><!-- Header Top End -->
        
        <!-- Header Bottom Start -->
        <div class="header-bottom section">
            <div class="container">
                <div class="row">
                   
                    <!-- Header Bottom Wrapper Start -->
                    <div class="header-bottom-wrapper text-center col">

                        <!-- Header Bottom Logo -->
                        <div class="header-bottom-logo">
                            <a href="index.php" class="logo"><img src="img/logo.png" alt="logo"></a>
                        </div>

                        <!-- Main Menu -->
                        <nav id="main-menu" class="main-menu">
                            <ul>
                                <li class="active"><a href="index.php">home</a></li>
                                <?php while ($row = mysqli_fetch_array($query_danhmuc)) { ?>
                                <li>
                                        <a href="shop.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc']?>">
                        <?php echo $row["tendanhmuc"]?>
                        </a>
                                
                        </li>
                        <?php } ?>
                                <li><a href="about.php">about</a></li>
                                <li><a href="#">pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="cart.php">cart</a></li>
                                        <li><a href="checkout.php">checkout</a></li>
                                        <li><a href="shopping-cart.php">shopping-cart</a></li>
										
                                    </ul>
                                </li>
                              
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </nav>

                        <!-- Header Search -->
                        <div class="header-search">
                            
                            <!-- Search Toggle -->
                            <button class="search-toggle"><i class="ion-ios-search-strong"></i></button>
                            
                            <!-- Search Form -->
                            <div class="header-search-form">
                                <form action="#">
                                    <input type="text" placeholder="Search...">
                                    <button><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                            
                        </div>
                        
                        <!-- Mobile Menu -->
                        <div class="mobile-menu section d-md-none"></div>

                    </div><!-- Header Bottom Wrapper End -->
                    
                </div>
            </div>
        </div><!-- Header Bottom End -->
        
    </div><!-- Header Section End -->
    
  
   
       
    <!-- Page Banner Section Start-->
    <div class="page-banner-section section" style="background-image: url(img/bg/anh3.webp)">
        <div class="container">
            <div class="row">
                
                <!-- Page Title Start -->
                <div class="page-title text-center col">
                    <h1>Shop page</h1>
                </div><!-- Page Title End -->
                
            </div>
        </div>

    </div><!-- Page Banner Section End-->
    <br>
    <?php 
    $sql_pro = "SELECT * FROM tbl_danhmuc, tbl_sanpham WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_danhmuc = ?";
    $stmt = mysqli_prepare($mysqli, $sql_pro);
    mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
    mysqli_stmt_execute($stmt);
    $query_pro = mysqli_stmt_get_result($stmt);
?>

<!-- Product Section Start-->
<div class="product-section section pt-120 pb-120">
    <div class="container">

        <!-- Product Wrapper Start-->
        <div class="row">

            <!-- Product Start-->
            <?php while ($row = mysqli_fetch_array($query_pro)) { ?>
            <div class="col-lg-4 col-md-6 col-12 mb-60">

                <div id="product" class="product">
               
                    <!-- Image Wrapper -->
                    <div class="image">
                        <!-- Image -->
                        <img src="admin/modules/quanlysanpham/upload/<?php echo $row['hinhanh'] ?>" alt="Product Image"  width="400px">
                        <!-- Wishlist -->
                        <a href="#" class="wishlist"><i class="fa fa-heart-o"></i></a>
                        <!-- Label -->
                        <span class="label">New</span>
                    </div>

                    <!-- Content -->
                    <div class="content">

                        <!-- Head Content -->
                        <div class="head fix">

                            <!-- Title & Category -->
                            <div class="title-category float-left">
                                <h5 class="title"><a href="product-details.php">Tên sản phẩm: <?php echo $row['tensanpham'] ?></a></h5>
                                <!-- <a href="shop.php" class="category">Catalog</a> -->
                            </div>
                            <!-- Price -->
                            <div class="price float-right">
                                <span class="new">Price: <?php echo number_format($row['giasanpham']).'VNĐ'?></span>
                                <!-- Old Price Mockup If Need -->
                                <!-- <span class="old">$46</span> -->
                            </div>

                        </div>

                        <!-- Action Button -->
                        <div class="action-button fix">
                        <button class="add-to-cart-btn"   data-product-id="<?php echo $row['id_sanpham'] ?>" data-product-name="<?php echo $row['tensanpham'] ?>" data-product-price="<?php echo number_format($row['giasanpham']).'VNĐ'?>" data-product-image="admin/modules/quanlysanpham/upload/<?php echo $row['hinhanh'] ?>">Thêm vào giỏ hàng</button>
                        </div>

                    </div>

                </div>
                
            </div><!-- Product End-->
            <?php } ?>
 
            <!-- Pagination Start -->
            <div class="pagination col-12 mt-20">
                <ul>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li class="arrows"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div><!-- Pagination End -->
           
        </div><!-- Product Wrapper End-->
       
    </div>
    
</div><!-- Product Section End-->



       
    <!-- Footer Section Start-->
    <div class="footer-section section bg-dark" style="background-image: url(img/bg/5.jpg)">
        <div class="container">
            
            <div class="row">
                <div class="col">
    
                    <!-- Footer Top Start -->
                    <div class="footer-top section pt-80 pb-50">
                        <div class="row">
    
                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">
    
                                <img class="footer-logo" src="img/logo.png" alt="logo">
                                <h3>Welcome to The Coffee House.</h3><p><b>The most comfortable place enjoy coffee</b></p>
    
                            </div>
    
                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-2 col-md-3 col-12 mb-40">
    
                                <h4 class="widget-title">Information</h4>
    
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Shop</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>  
    
                            </div>
    
                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-2 col-md-3 col-12 mb-40">
    
                                <h4 class="widget-title">Account</h4>
    
                                <ul>
                                    <li><a href="#">Log in</a></li>
                                    <li><a href="#">Register</a></li>
                                    <li><a href="#">Account</a></li>
                                    <li><a href="#">Favourite</a></li>
                                    <li><a href="#">Cart</a></li>
                                </ul>  
    
                            </div>
    
                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">
    
                                <h4 class="widget-title">Contact Us</h4>
    
                                <ul>
                                    <li><span>Address:</span> Tầng 3-4 Hub Building 195/10E Điện Biên Phủ,P.15, Q.Bình Thạnh, TP.Hồ Chí Minh</li>
                                    <li><span>Phone:</span> 1800 6936</li>
                                    
                                    <li><span>Email:</span> Hr.hcm@Thecoffeehouse.vn</li>
                                </ul>  
    
                            </div>
    
                        </div>
                    </div><!-- Footer Top End -->
                    
                   
    
                </div>
            </div>
            
        </div>
    </div><!-- Footer Section End-->
    
    
                   
                    </div>
                </div>
                
            </div>
        </div><!-- Footer Section End-->
    

</div><!-- Main Wrapper End -->

<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<!-- Popper JS -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="js/plugins.js"></script>
<!-- Ajax Mail JS -->
<script src="js/ajax-mail.js"></script>
<!-- Main JS -->
<script src="js/main.js"></script>
<script src="js/cart.js"></script>
</body>
</php>