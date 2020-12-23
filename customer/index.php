<?php
    include_once('../lib/dao.php');
    $dao = new DAO();
    $listHotItems = $dao->getHotItem();
    $listDiscountItems = $dao->getDiscountItem();
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Welcome to Flat Shop</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <link href="css/sequence-looptheme.css" rel="stylesheet" media="all" />
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="home">
    <div class="wrapper">
        <?php include('header.php');?>
        <div class="clearfix"></div>
        <div class="hom-slider">
            <div class="container">
                <div id="sequence">
                    <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
                    <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
                    <ul class="sequence-canvas">
                        <li class="animate-in">
                            <div class="flat-caption caption1 formLeft delay300 text-center"><span class="suphead">Bộ sưu tập Thu Đông 2020</span></div>
                            <div class="flat-caption caption2 formLeft delay400 text-center">
                                <h1>Thời trang phang thời tiết</h1>
                            </div>
                            <div class="flat-caption caption3 formLeft delay500 text-center">
                                <p></p>
                            </div>
                            <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">Chi tiết</a></div>
                            <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="images/slider-image-01.png" alt=""></div>
                        </li>
                        <li>
                            <div class="flat-caption caption2 formLeft delay400">
                                <h1>GUCCI chính hãng</h1>
                            </div>
                            <div class="flat-caption caption3 formLeft delay500">
                                <h2>Mặc vào là sang, mọi người sẽ trầm trồ về sự sang chảnh của bạn</h2>
                            </div>
                            <div class="flat-button caption5 formLeft delay600"><a class="more" href="#">Chi tiết</a></div>
                            <div class="flat-image formBottom delay200" data-bottom="true"><img src="images/slider-image-03.png" alt=""></div>
                        </li>
                        <li>
                            <div class="flat-caption caption2 formLeft delay400 text-center">
                                <h1>Sale sập sàn mùa noel</h1>
                            </div>
                            <div class="flat-caption caption3 formLeft delay500 text-center">
                                <p>Hãy để chúng tôi chăm sóc bạn thay người yêu bạn</p>
                            </div>
                            <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">Chi tiết</a></div>
                            <div class="flat-image formBottom delay200" data-bottom="true"><img src="images/slider-image-02.png" alt=""></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="promotion-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="promo-box"><img src="images/promotion-01.png" alt=""></div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="promo-box"><img src="images/promotion-02.png" alt=""></div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="promo-box"><img src="images/promotion-03.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container_fullwidth">
            <div class="container">
                <div class="hot-products">
                    <h3 class="title">Sản phẩm <strong>Hot</strong></h3>
                    <div class="control"><a id="prev_hot" class="prev" href="#">&lt;</a><a id="next_hot" class="next" href="#">&gt;</a></div>
                    <ul id="hot">
                        <li>
                            <div class="row">
                                <?php
                                   for($i = 0; $i < 4; $i++) {
                                        $dt = '<div class="col-md-3 col-sm-6">
                                                <div class="products">
                                                    <div class="offer">'.$listHotItems[$i]['liked'].' <i class="fa fa-heart-o" style="font-size: 13px;"></i></div>
                                                    <div class="thumbnail">
                                                        <a href="details.php"><img class="image-fullsize" src="'.$listHotItems[$i]['imageUrl'].'" alt="Product Name"></a>
                                                    </div>
                                                    <div class="productname">'.$listHotItems[$i]['name'].'</div>
                                                    <h4 class="price">'.number_format($listDiscountItems[$i]['price'],0, '', ',').'<small style="color: red"> vnđ</small></h4>
                                                    <div class="button_group"><button class="button add-cart" onclick="addToCart('.$listHotItems[$i]['id'].')" type="button">Thêm vào giỏ</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                                </div>
                                            </div>';
                                        echo $dt;
                                    }
                                ?>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <?php
                                   for($i = 4; $i < 8; $i++) {
                                        $dt = '<div class="col-md-3 col-sm-6">
                                                <div class="products">
                                                    <div class="offer">'.$listHotItems[$i]['liked'].' <i class="fa fa-heart-o" style="font-size: 13px;"></i></div>
                                                    <div class="thumbnail">
                                                        <a href="details.php"><img class="image-fullsize" src="'.$listHotItems[$i]['imageUrl'].'" alt="Product Name"></a>
                                                    </div>
                                                    <div class="productname">'.$listHotItems[$i]['name'].'</div>
                                                    <h4 class="price">'.number_format($listHotItems[$i]['price'],0, '', ',').'<small style="color: red"> vnđ</small></h4>
                                                    <div class="button_group"><button class="button add-cart" onclick="addToCart('.$listHotItems[$i]['id'].')" type="button">Thêm vào giỏ</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                                </div>
                                            </div>';
                                        echo $dt;
                                }?>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="featured-products">
                    <h3 class="title">Sản phẩm <strong>khuyến mại</strong></h3>
                    <div class="control"><a id="prev_featured" class="prev" href="#">&lt;</a><a id="next_featured" class="next" href="#">&gt;</a></div>
                    <ul id="featured">
                        <li>
                            <div class="row">
                                <?php
                                   for($i = 0; $i < 4; $i++) {
                                        $dt = '<div class="col-md-3 col-sm-6">
                                                <div class="products">
                                                    <div class="offer">-'.$listDiscountItems[$i]['discount'].'<i style="font-size: 18px;">%</i></div>
                                                    <div class="thumbnail">
                                                        <a href="details.php"><img class="image-fullsize" src="'.$listDiscountItems[$i]['imageUrl'].'" alt="Product Name"></a>
                                                    </div>
                                                    <div class="productname">'.$listDiscountItems[$i]['name'].'</div>
                                                    <h4 class="price">'.number_format($listDiscountItems[$i]['price'],0, '', ',').'<small style="color: red"> vnđ</small></h4>
                                                    <div class="button_group"><button class="button add-cart" onclick="addToCart('.$listDiscountItems[$i]['id'].')" type="button">Thêm vào giỏ</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                                </div>
                                            </div>';
                                        echo $dt;
                                    }
                                ?>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <?php
                                   for($i = 4; $i < 8; $i++) {
                                        $dt = '<div class="col-md-3 col-sm-6">
                                                <div class="products">
                                                <div class="offer">-'.$listDiscountItems[$i]['discount'].'<i style="font-size: 18px;">%</i></div>
                                                    <div class="thumbnail">
                                                        <a href="details.php"><img class="image-fullsize" src="'.$listDiscountItems[$i]['imageUrl'].'" alt="Product Name"></a>
                                                    </div>
                                                    <div class="productname">'.$listDiscountItems[$i]['name'].'</div>
                                                    <h4 class="price">'.number_format($listDiscountItems[$i]['price'],0, '', ',').'<small style="color: red"> vnđ</small></h4>
                                                    <div class="button_group"><button class="button add-cart" onclick="addToCart('.$listDiscountItems[$i]['id'].')" type="button">Thêm vào giỏ</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                                                </div>
                                            </div>';
                                        echo $dt;
                                }?>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="our-brand">
                    <h3 class="title"><strong>Thương hiệu</strong> cung cấp</h3>
                    <div class="control"><a id="prev_brand" class="prev" href="#">&lt;</a><a id="next_brand" class="next" href="#">&gt;</a></div>
                    <ul id="braldLogo">
                        <li>
                            <ul class="brand_item">
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/themeforest.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/photodune.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/activeden.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul class="brand_item">
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/themeforest.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/photodune.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/activeden.png" alt=""></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php include('footer.php');?>
    </div>
    <!-- Bootstrap core JavaScript==================================================-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.sequence-min.js"></script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/script.min.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            getCountCart();
            getListCart();
        }
    </script>
</body>

</html>