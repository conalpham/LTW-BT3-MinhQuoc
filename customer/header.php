<?php
    session_start();
?>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" alt="FlatShop"></a>
                </div>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="header_top">
                    <div class="row">
                        
                        <div class="col-md-10">
                            <ul class="topmenu">
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Dịch vụ</a></li>
                                <li><a href="#">Trung tâm hỗ trợ</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <ul class="usermenu">
                                <li>
                                    <div class="dropdown show">
                                        <a class="log btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo $_SESSION['fullname']?>
                                        </a>
                                        <div class="userdropdown dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Thông tin tài khoản</a>
                                            <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                                            <a class="dropdown-item" href="../lib/controller.php?q=logout">Đăng xuất</a>
                                        </div>
                                    </div>
                                    
                                </li>
                                <!-- <li><a href="checkout2.php" class="reg">Register</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="header_top">
                    <ul class="option">
                        <li id="search" class="search">
                            <form><input class="search-submit" type="submit" value=""><input class="search-input" placeholder="Enter your search term..." type="text" value="" name="search"></form>
                        </li>
                        <li class="option-cart">
                            <a href="#" class="cart-icon">Giỏ hàng <span class="cart_no"></span></a>
                            <ul class="option-cart-item">
                            </ul>
                        </li>
                    </ul>
                    <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active dropdown">
                                <a href="./index.php">Trang chủ</a>
                            </li>
                            <li><a href="./index.php">Giới thiệu</a></li>
                            <li class="dropdown">
                                <a href="productlist.php" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
                                <div class="dropdown-menu mega-menu">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <ul class="mega-menu-links">
                                                <li><a href="productgird.php"><strong>Thời trang nam</strong></a></li>
                                                <li><a href="productgird.php">Shirts & tops</a></li>
                                                <li><a href="productgird.php">Laptop & Brie</a></li>
                                                <li><a href="productgird.php">Dresses</a></li>
                                                <li><a href="productgird.php">Blazers & Jackets</a></li>
                                                <li><a href="productgird.php">Shoulder Bags</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <ul class="mega-menu-links">
                                                <li><a href="productgird.php"><strong>Thời trang nữ</strong></a></li>
                                                <li><a href="productgird.php">Shirts & tops</a></li>
                                                <li><a href="productgird.php">Laptop & Brie</a></li>
                                                <li><a href="productgird.php">Dresses</a></li>
                                                <li><a href="productgird.php">Blazers & Jackets</a></li>
                                                <li><a href="productgird.php">Shoulder Bags</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="productgird.php" class="dropdown-toggle" data-toggle="dropdown">Bộ sưu tập</a>
                                <div class="dropdown-menu mega-menu">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <ul class="mega-menu-links">
                                                <li><a href="productgird.php">New Collection</a></li>
                                                <li><a href="productgird.php">Shirts & tops</a></li>
                                                <li><a href="productgird.php">Laptop & Brie</a></li>
                                                <li><a href="productgird.php">Dresses</a></li>
                                                <li><a href="productgird.php">Blazers & Jackets</a></li>
                                                <li><a href="productgird.php">Shoulder Bags</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <ul class="mega-menu-links">
                                                <li><a href="productgird.php">New Collection</a></li>
                                                <li><a href="productgird.php">Shirts & tops</a></li>
                                                <li><a href="productgird.php">Laptop & Brie</a></li>
                                                <li><a href="productgird.php">Dresses</a></li>
                                                <li><a href="productgird.php">Blazers & Jackets</a></li>
                                                <li><a href="productgird.php">Shoulder Bags</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="cart.php">Danh sách đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>