<?php
include("admin/config/config.php");
session_start();
?>

<?php
if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['tenkhachhang'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $matkhau = md5($_POST['matkhau']);
    $dienthoai = $_POST['dienthoai'];
    $sql = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) Value('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')");
    if ($sql) {
        echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
        $_SESSION['tenkhachhang'] = $tenkhachhang;
        header('Location:index.php?quanly=index');
    }
}
?>
<?php

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));

    if ($username != "" && $password != "") {
        $stmt = $mysqli->prepare("SELECT id_admin, username FROM tbl_admin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['id_admin'] = $row['id_admin'];
            $_SESSION['username'] = $username; // Store username in session

            echo '<script>';
            echo 'window.location.href = "\admin\index.php";';
            echo '</script>';
        } else {
            echo '<span>Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng nhập lại.</span>';
        }
    } else {
        echo '<span>Vui lòng nhập tên đăng nhập và mật khẩu.</span>';
    }
}
?>

<!-- ... existing HTML code ... -->



<!doctype php>
<php class="no-js" lang="en">


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
    <style type="text/css">
        table.dangky tr td {
            padding: 5px;

        }

        .account_form h2 {
            font-size: 30px;
            text-transform: capitalize;
            color: #333;
            font-weight: 700;
            line-height: 22px;
            margin-bottom: 38px;
        }

        .account_form form {
            border: 1px solid #d3ced2;
            padding: 20px;
            border-radius: 5px;
        }

        .account_form label {
            font-size: 15px;
            font-weight: 400;
            color: #555;
        }

        .account_form label {
            font-size: 15px;
            font-weight: 400;
            color: #555;
            cursor: pointer;
        }

        .account_form input {
            border: 1px solid #e5e5e5;
            height: 32px;
            max-width: 100%;
            padding: 0 0 0 10px;
            background: none;
        }

        .login_submit button {
            background: #333;
            border: 0;
            color: #fff;
            display: inline-block;
            font-size: 12px;
            font-weight: 700;
            height: 38px;
            line-height: 18px;
            padding: 10px 15px;
            text-transform: uppercase;
            cursor: pointer;
            -webkit-transition: .3s;
            transition: .3s;
            margin-right: 20px;
        }

        .login_submit button:hover {
            background: #e84c3d;
        }

        .login_submit label input[type="checkbox"] {
            width: 15px;
            height: 13px;
            margin-right: 3px;
        }

        .login_submit a {
            text-align: right;
            font-size: 13px;
            color: #00bba6;
            float: right;
            line-height: 39px;
        }

        .login_submit a:hover,
        .account_form label:hover {
            color: #e84c3d;
        }

        .customer_login {
            padding: 69px 20px 35px;
        }

        .account_form {
            margin-bottom: 35px;
        }

        .table_desc.wishlist table tbody tr td.product_total a {
            background: #00bba6;
            font-size: 12px;
            font-weight: 700;
            height: 38px;
            line-height: 18px;
            padding: 10px 20px;
            color: #fff;
            text-transform: uppercase;
        }

        .table_desc.wishlist table tbody tr td.product_total a:hover {
            background: #e84c3d;
        }

        .table_desc.wishlist table tbody tr:last-child td {
            border-bottom: 0;
        }

        .wishlist-share {
            text-align: center;
            padding: 20px 0;
            border: 1px solid #ddd;
            margin-bottom: 35px;
        }

        .wishlist-share ul li {
            display: inline-block;
        }

        .wishlist-share ul li a {
            padding: 0 10px;
            color: #333;
            display: block;
        }

        .wishlist-share h4 {
            font-size: 18px;
            color: #333;
            font-weight: 700;
            text-transform: capitalize;
        }
    </style>

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
                                                <li><a href="dangky.php">Đăng nhập</a>

                                                </li>
                                                <li>
                                                    <div class="shopping_cart">



                                                        <a href="">Shopping Cart <i class="fa fa-shopping-cart"></i></a>

                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div><!-- Header Top Wrapper End -->

                            </div>
                        </div>
                    </div>
                </div><!-- Header Top End -->
       


              


                <!-- customer login start -->
                <div class="customer_login">
                    <div class="row">
                        <!--login area start-->
                        <div class="col-lg-6 col-md-6">
                            <div class="account_form">
                                <h2>Đăng nhập</h2>
                                <form action="" method="post">
                                    <p>
                                        <label>Tên đăng nhập <span>*</span></label>
                                        <input type="text" name="tenkhachhang">
                                        <?php
                                        if (isset($_POST['login'])) {
                                            $tenkhachhang = trim($_POST['tenkhachhang']);
                                            if ($tenkhachhang == "") {
                                                ?>
                                                <span>Vui lòng nhập tên đăng nhập.</span>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </p>
                                    <p>
                                        <label>Mật khẩu <span>*</span></label>
                                        <input type="password" name="matkhau">
                                        <?php
                                        if (isset($_POST['login'])) {
                                            $tenkhachhang = trim($_POST['tenkhachhang']);
                                            $matkhau = md5(trim($_POST['matkhau']));
                                            $mkadmin = trim($_POST['matkhau']);
                                            $check = ((isset($_POST['check']) != 0) ? 1 : "");
                                            if ($matkhau != "") {
                                                $stmt = $mysqli->prepare("SELECT id_dangky, tenkhachhang FROM tbl_dangky WHERE tenkhachhang = ?  AND matkhau = ?");
                                                $stmt->bind_param("ss", $tenkhachhang, $matkhau);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $_SESSION['id_dangky'] = $row['id_dangky'];

                                                    $_SESSION['customername'] = $tenkhachhang; // Lưu tên người dùng vào session
                                        

                                                    echo '<script>';
                                                    echo 'window.location.href = "index.php";';
                                                    echo '</script>';

                                                    ?>


                                                <?php } else if ($result->num_rows == 0) {

                                                    $stmt = $mysqli->prepare("SELECT id_admin, username FROM tbl_admin WHERE username = ?  AND `password` = ?");
                                                    $stmt->bind_param("ss", $tenkhachhang,  $mkadmin);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    if ($result->num_rows > 0) {
                                                        $row = $result->fetch_assoc();
                                                        $_SESSION['id_dangky'] = $row['id_dangky'];

                                                        $_SESSION['customername'] = $tenkhachhang; // Lưu tên người dùng vào session
                                        

                                                        echo '<script>';
                                                        echo 'window.location.href = "admin/index.php";';
                                                        echo '</script>';

                                                        ?>

                                                        <?php } else {
                                                        ?>
                                                            <span>Tên đăng nhập hoặc mật khẩu không chính xác. Vui lòng nhập lại.</span>
                                                            <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <span>Vui lòng nhập mật khẩu.</span>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </p>
                                    <div class="login_submit">
                                        <button type="submit" name="login">Đăng nhập</button>
                                        <a href="forget-password-mail.php">Quên mật khẩu?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--login area end-->

                        
                        <!--register area start-->
                        <div class="col-lg-6 col-md-6">
                            <div class="account_form register">
                                <h2>Đăng ký</h2>
                                <form action="" method="post">
                                    <p>
                                        <label>Tên đăng nhập <span>*</span></label>
                                        <input type="text" name="tenkhachhang">
                                        <?php
                                        if (isset($_POST['dangky'])) {
                                            $tenkhachhang = ($_POST['tenkhachhang']);
                                            if ($tenkhachhang != "") {
                                                $stmtname = $mysqli->prepare("SELECT tenkhachhang FROM tbl_dangky WHERE tenkhachhang = '$tenkhachhang'");
                                                $stmtname->execute();
                                                $resultname = $stmtname->get_result();
                                                if ($resultname->num_rows > 0) {
                                                    ?>
                                                    <span>Tên đăng nhập đã tồn tại. Vui lòng sử dụng tên đăng nhập khác.</span>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                        <span>Vui lòng nhập tên đăng nhập.</span>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </p>

                                    <p>
                                        <label>Email <span>*</span></label>
                                        <input type="email" name="email">
                                        <?php
                                        if (isset($_POST['dangky'])) {
                                            $email = ($_POST['email']);
                                            $dienthoai = ($_POST['dienthoai']);
                                            $diachi = ($_POST['diachi']);
                                            if ($email != "") {
                                                $stmtemail = $mysqli->prepare("SELECT email FROM tbl_dangky WHERE email = '$email'");
                                                $stmtemail->execute();
                                                $resultemail = $stmtemail->get_result();
                                                if ($resultemail->num_rows > 0) {
                                                    ?>
                                                    <span>Email đã tồn tại. Vui lòng sử dụng email khác.</span>
                                                    <?php
                                                } else {
                                                    $sql = "INSERT INTO tbl_dangky (tenkhachhang, email, diachi, matkhau, dienthoai)"
                                                        . "VALUES ('$tenkhachhang','$email','$diachi', '$matkhau','$dienthoai')";
                                                    if ($conn->query($sql)) {
                                                        ?>
                                                        <span>Đăng ký thành công.</span>
                                                    <?php } else {
                                                        ?>
                                                        <span>Đăng ký thất bại.</span>
                                                        <?php
                                                    }
                                                }
                                            } else {
                                                ?>
                                        <span>Vui lòng nhập email.</span>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </p>

                                    <p>
                                        <label>Địa chỉ </label>
                                        <input type="text" name="diachi">
                                    </p>
                                    <p>
                                        <label>Mật khẩu <span>*</span></label>
                                        <input type="password" name="matkhau">
                                        <?php
                                        if (isset($_POST['dangky'])) {
                                            $matkhau = ($_POST['matkhau']);
                                            if ($matkhau == "") {
                                                ?>
                                                <span>Vui lòng nhập mật khẩu.</span>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </p>
                                    <p>
                                        <label>Số điện thoại </label>
                                        <input type="tel" name="dienthoai">
                                    </p>
                                    <div class="login_submit">
                                        <button type="submit" name="dangky">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--register area end-->
                    </div>
                </div>
                <!-- customer login end -->

            </div>
            <!--pos page inner end-->
        </div>
        </div>
        <!--pos page end-->
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
                                        <h3>Welcome to The Coffee House.</h3>
                                        <p><b>The most comfortable place enjoy coffee</b></p>

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
                                            <li><span>Address:</span> Tầng 3-4 Hub Building 195/10E Điện Biên Phủ,P.15,
                                                Q.Bình Thạnh, TP.Hồ Chí Minh</li>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Cart js -->
        <script src="js/cart.js"></script>
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
       
    </body>

</php>