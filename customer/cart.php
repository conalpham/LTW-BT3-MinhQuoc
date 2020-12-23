<?php
  include_once('../lib/dao.php');
  $dao = new DAO();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
        Welcome to FlatShop
    </title>
    
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
</head>

<body>
    <div class="wrapper">
        <?php include('header.php');
            $listBill = $dao->getListBill();
        ?>
        <div class="clearfix">
      </div>
      <div class="container_fullwidth">
        <div class="container shopping-cart">
          <div class="row">
            <div class="col-md-12">
              <h3 class="title">
                Giỏ hàng
              </h3>
              <div class="clearfix">
              </div>
              <div class="content">
                <table class="shop-table">
                  <thead>
                    <tr>
                      <th>
                        Mã đơn hàng
                      </th>
                      <th>
                        Ngày đặt
                      </th>
                      <th>
                        Trạng thái
                      </th>
                      <th>
                        Thành tiền
                      </th>
                      <th>
                        Thao tác
                      </th>
                    </tr>
                  </thead>
                  <tbody class="checkout-list">
                    <?php
                      $dt = "";
                      foreach ($listBill as $bill) {
                        $dt .= '<tr>
                            <td>HD0'.$bill['idBill'].'</td>
                            <td>'.$bill['createdAt'].'</td>';
                        switch ($bill['currentStatus']) {
                          case 1:
                            {
                                $dt .= '
                                <td>
                                    <span class="label label-primary">Chờ xác nhận</span>
                                </td>
                                ';
                                break;
                            }
                            case "2":
                                {
                                    $dt .= '
                                    <td>
                                        <span class="label label-info">Chờ lấy hàng</span>
                                    </td>
                                    ';
                                    break;
                                }
                            case "3":
                                {
                                    $dt .= '
                                    <td>
                                        <span class="label label-warning">Đang giao</span>
                                    </td>
                                    ';
                                    break;
                                }
                            case "4":
                                {
                                    $dt .= '
                                    <td>
                                        <span class="label label-success">Đã giao hàng</span>
                                    </td>
                                    ';
                                    break;
                                }
                            case "5":
                                {
                                    $dt .= '
                                    <td>
                                        <span class="label label-danger">Yêu cầu trả hàng</span>
                                    </td>
                                    ';
                                    break;
                                }
                        }
                        $dt .='
                            <td>
                                <h5>
                                '.number_format($bill['amount'], 0, '', ',').'
                                <small style="color: red"> vnđ</small>
                                </h5>
                            </td>
                            <td>
                                <a>
                                <img src="images/remove.png" alt="">
                                </a>
                            </td>
                            </tr>';
                      }
                      echo $dt;
                    ?>
                  </tbody>
                </table>
              
                <div class="clearfix">
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
          <div class="our-brand">
            <h3 class="title">
              <strong>
                Thương hiệu 
              </strong>
              cung cấp
            </h3>
            <div class="control">
              <a id="prev_brand" class="prev" href="#">
                &lt;
              </a>
              <a id="next_brand" class="next" href="#">
                &gt;
              </a>
            </div>
            <ul id="braldLogo">
              <li>
                <ul class="brand_item">
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/envato.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/themeforest.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/photodune.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/activeden.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/envato.png" alt="">
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <ul class="brand_item">
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/envato.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/themeforest.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/photodune.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/activeden.png" alt="">
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="brand-logo">
                        <img src="images/envato.png" alt="">
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <?php include('footer.php'); ?>
    </div>
    <!-- Bootstrap core JavaScript==================================================-->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js">
    </script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js">
    </script>
    <script type="text/javascript" src="js/script.min.js" >
    </script>
    <script type="text/javascript">
        window.onload = function() {
            getCountCart();
            getListCart();
        }
    </script>
  </body>
</html>