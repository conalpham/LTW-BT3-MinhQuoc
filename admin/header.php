<?php include('../lib/dbCon.php')?>
<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header('location:login.php');
    }

    if (isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        if ($role == 'customer') {
            header('location:customer/index.php');
        }
    }
    $url = $_SERVER['REQUEST_URI'];
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="../customer/images/logo.png" width="100" height="50">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li <?php if (strpos($url,'index.php')) {
                        echo 'class="active"';
                    }?>
                >
                    <a href="index.php">
                        <i class="fas fa-eye"></i><strong>Tổng quan</strong>
                    </a>
                </li>
                <li <?php if (strpos($url,'Bill.php')) {
                        echo 'class="active"';
                    }?>
                >
                    <a href="Bill.php">
                        <i class="fa-fw fas fa-file-invoice-dollar"></i><strong>Đơn hàng</strong>
                    </a>
                </li>
                <li <?php if (strpos($url,'Import.php')) {
                        echo 'class="active"';
                    }?>
                >
                    <a href="Import.php">
                        <i class="glyphicon glyphicon-save"></i><strong>Nhập hàng</strong>
                    </a>
                </li>
                <li <?php if (strpos($url,'BaoCao.php')) {
                        echo 'class="active"';
                    }?>
                >
                    <a href="BaoCao.php">
                        <i class="glyphicon glyphicon-list-alt"></i><strong>Thống kê</strong>
                    </a>
                </li>
                <li>
                    <a title="Đăng xuất" href="../lib/controller.php?q=logout">
                        <span class="glyphicon glyphicon-log-out"></span>
                        <strong>Đăng xuất</strong>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="js/main.js"></script>