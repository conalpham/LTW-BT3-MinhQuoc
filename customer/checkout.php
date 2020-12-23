<?php
  include_once('../lib/dao.php');
  $dao = new DAO();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>
      Welcome to FlatShop
    </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <?php include('header.php'); ?>
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
                        Hình ảnh
                      </th>
                      <th>
                        Chi tiết
                      </th>
                      <th>
                        Giá
                      </th>
                      <th>
                        Số lượng
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
                      $total = 0;
                      foreach ($_SESSION['cart'] as $key => $value) {
                        $cart = $dao->getItemById($key);
                        $price = $cart['price'] - $cart['price'] * $cart['discount'] / 100;
                        $sum = $price * $value;
                        $total += $sum;
                        $dt .= '<tr>
                          <td>
                            <img src="'.$cart['imageUrl'].'" alt="">
                          </td>
                          <td>
                            <div class="shop-details">
                              <div class="productname">
                                '.$cart['name'].'
                              </div>
                              <p>
                                <img alt="" src="images/star.png">
                                <a class="review_num" href="#">
                                  02 Đánh giá(s)
                                </a>
                              </p>
                              <div class="color-choser">
                                <span class="text">
                                  Màu : 
                                </span>
                                <ul>
                                  <li>
                                    <a class="black-bg " href="#">
                                      black
                                    </a>
                                  </li>
                                  <li>
                                    <a class="red-bg" href="#">
                                      light red
                                    </a>
                                  </li>
                                </ul>
                              </div>
                              <p>
                                Mã sản phẩm : 
                                <strong class="pcode">
                                  Dress '.$cart['id'].'
                                </strong>
                              </p>
                            </div>
                          </td>
                          <td>
                            <h5>
                              '.number_format($price, 0, '', ',').'
                              <small style="color: red"> vnđ</small>
                            </h5>
                          </td>
                          <td>
                            '.$value.'
                          </td>
                          <td>
                            <h5>
                              <strong class="red">
                                '.number_format($sum, 0, '', ',').'
                              <small style="color: red"> vnđ</small>
                              </strong>
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
                  <!-- <tfoot>
                    <tr>
                      <td colspan="6">
                        <button class="pull-left">
                          Tiếp tục mua sắm
                        </button>
                        <button class=" pull-right">
                          Update Shopping Cart
                        </button>
                      </td>
                    </tr>
                  </tfoot> -->
                </table>
              
                <div class="clearfix">
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-6">
                    <!-- <div class="shippingbox">
                      <h5>
                        Estimate Shipping And Tax
                      </h5>
                      <form>
                        <label>
                          Select Country *
                        </label>
                        <select class="">
                          <option value="AL">
                            Alabama
                          </option>
                          <option value="AK">
                            Alaska
                          </option>
                          <option value="AZ">
                            Arizona
                          </option>
                          <option value="AR">
                            Arkansas
                          </option>
                          <option value="CA">
                            California
                          </option>
                          <option value="CO">
                            Colorado
                          </option>
                          <option value="CT">
                            Connecticut
                          </option>
                          <option value="DE">
                            Delaware
                          </option>
                          <option value="DC">
                            District Of Columbia
                          </option>
                          <option value="FL">
                            Florida
                          </option>
                          <option value="GA">
                            Georgia
                          </option>
                          <option value="HI">
                            Hawaii
                          </option>
                          <option value="ID">
                            Idaho
                          </option>
                          <option selected="" value="IL">
                            Illinois
                          </option>
                          <option value="IN">
                            Indiana
                          </option>
                          <option value="IA">
                            Iowa
                          </option>
                          <option value="KS">
                            Kansas
                          </option>
                          <option value="KY">
                            Kentucky
                          </option>
                          <option value="LA">
                            Louisiana
                          </option>
                          <option value="ME">
                            Maine
                          </option>
                          <option value="MD">
                            Maryland
                          </option>
                          <option value="MA">
                            Massachusetts
                          </option>
                          <option value="MI">
                            Michigan
                          </option>
                          <option value="MN">
                            Minnesota
                          </option>
                          <option value="MS">
                            Mississippi
                          </option>
                          <option value="MO">
                            Missouri
                          </option>
                          <option value="MT">
                            Montana
                          </option>
                          <option value="NE">
                            Nebraska
                          </option>
                          <option value="NV">
                            Nevada
                          </option>
                          <option value="NH">
                            New Hampshire
                          </option>
                          <option value="NJ">
                            New Jersey
                          </option>
                          <option value="NM">
                            New Mexico
                          </option>
                          <option value="NY">
                            New York
                          </option>
                          <option value="NC">
                            North Carolina
                          </option>
                          <option value="ND">
                            North Dakota
                          </option>
                          <option value="OH">
                            Ohio
                          </option>
                          <option value="OK">
                            Oklahoma
                          </option>
                          <option value="OR">
                            Oregon
                          </option>
                          <option value="PA">
                            Pennsylvania
                          </option>
                          <option value="RI">
                            Rhode Island
                          </option>
                          <option value="SC">
                            South Carolina
                          </option>
                          <option value="SD">
                            South Dakota
                          </option>
                          <option value="TN">
                            Tennessee
                          </option>
                          <option value="TX">
                            Texas
                          </option>
                          <option value="UT">
                            Utah
                          </option>
                          <option value="VT">
                            Vermont
                          </option>
                          <option value="VA">
                            Virginia
                          </option>
                          <option value="WA">
                            Washington
                          </option>
                          <option value="WV">
                            West Virginia
                          </option>
                          <option value="WI">
                            Wisconsin
                          </option>
                          <option value="WY">
                            Wyoming
                          </option>
                        </select>
                        <label>
                          State / Province *
                        </label>
                        <select class="">
                          <option value="AL">
                            Alabama
                          </option>
                          <option value="AK">
                            Alaska
                          </option>
                          <option value="AZ">
                            Arizona
                          </option>
                          <option value="AR">
                            Arkansas
                          </option>
                          <option value="CA">
                            California
                          </option>
                          <option value="CO">
                            Colorado
                          </option>
                          <option value="CT">
                            Connecticut
                          </option>
                          <option value="DE">
                            Delaware
                          </option>
                          <option value="DC">
                            District Of Columbia
                          </option>
                          <option value="FL">
                            Florida
                          </option>
                          <option value="GA">
                            Georgia
                          </option>
                          <option value="HI">
                            Hawaii
                          </option>
                          <option value="ID">
                            Idaho
                          </option>
                          <option selected="" value="IL">
                            Illinois
                          </option>
                          <option value="IN">
                            Indiana
                          </option>
                          <option value="IA">
                            Iowa
                          </option>
                          <option value="KS">
                            Kansas
                          </option>
                          <option value="KY">
                            Kentucky
                          </option>
                          <option value="LA">
                            Louisiana
                          </option>
                          <option value="ME">
                            Maine
                          </option>
                          <option value="MD">
                            Maryland
                          </option>
                          <option value="MA">
                            Massachusetts
                          </option>
                          <option value="MI">
                            Michigan
                          </option>
                          <option value="MN">
                            Minnesota
                          </option>
                          <option value="MS">
                            Mississippi
                          </option>
                          <option value="MO">
                            Missouri
                          </option>
                          <option value="MT">
                            Montana
                          </option>
                          <option value="NE">
                            Nebraska
                          </option>
                          <option value="NV">
                            Nevada
                          </option>
                          <option value="NH">
                            New Hampshire
                          </option>
                          <option value="NJ">
                            New Jersey
                          </option>
                          <option value="NM">
                            New Mexico
                          </option>
                          <option value="NY">
                            New York
                          </option>
                          <option value="NC">
                            North Carolina
                          </option>
                          <option value="ND">
                            North Dakota
                          </option>
                          <option value="OH">
                            Ohio
                          </option>
                          <option value="OK">
                            Oklahoma
                          </option>
                          <option value="OR">
                            Oregon
                          </option>
                          <option value="PA">
                            Pennsylvania
                          </option>
                          <option value="RI">
                            Rhode Island
                          </option>
                          <option value="SC">
                            South Carolina
                          </option>
                          <option value="SD">
                            South Dakota
                          </option>
                          <option value="TN">
                            Tennessee
                          </option>
                          <option value="TX">
                            Texas
                          </option>
                          <option value="UT">
                            Utah
                          </option>
                          <option value="VT">
                            Vermont
                          </option>
                          <option value="VA">
                            Virginia
                          </option>
                          <option value="WA">
                            Washington
                          </option>
                          <option value="WV">
                            West Virginia
                          </option>
                          <option value="WI">
                            Wisconsin
                          </option>
                          <option value="WY">
                            Wyoming
                          </option>
                        </select>
                        <label>
                          Zip / Post Code *
                        </label>
                        <select class="">
                          <option value="AL">
                            Alabama
                          </option>
                          <option value="AK">
                            Alaska
                          </option>
                          <option value="AZ">
                            Arizona
                          </option>
                          <option value="AR">
                            Arkansas
                          </option>
                          <option value="CA">
                            California
                          </option>
                          <option value="CO">
                            Colorado
                          </option>
                          <option value="CT">
                            Connecticut
                          </option>
                          <option value="DE">
                            Delaware
                          </option>
                          <option value="DC">
                            District Of Columbia
                          </option>
                          <option value="FL">
                            Florida
                          </option>
                          <option value="GA">
                            Georgia
                          </option>
                          <option value="HI">
                            Hawaii
                          </option>
                          <option value="ID">
                            Idaho
                          </option>
                          <option selected="" value="IL">
                            Illinois
                          </option>
                          <option value="IN">
                            Indiana
                          </option>
                          <option value="IA">
                            Iowa
                          </option>
                          <option value="KS">
                            Kansas
                          </option>
                          <option value="KY">
                            Kentucky
                          </option>
                          <option value="LA">
                            Louisiana
                          </option>
                          <option value="ME">
                            Maine
                          </option>
                          <option value="MD">
                            Maryland
                          </option>
                          <option value="MA">
                            Massachusetts
                          </option>
                          <option value="MI">
                            Michigan
                          </option>
                          <option value="MN">
                            Minnesota
                          </option>
                          <option value="MS">
                            Mississippi
                          </option>
                          <option value="MO">
                            Missouri
                          </option>
                          <option value="MT">
                            Montana
                          </option>
                          <option value="NE">
                            Nebraska
                          </option>
                          <option value="NV">
                            Nevada
                          </option>
                          <option value="NH">
                            New Hampshire
                          </option>
                          <option value="NJ">
                            New Jersey
                          </option>
                          <option value="NM">
                            New Mexico
                          </option>
                          <option value="NY">
                            New York
                          </option>
                          <option value="NC">
                            North Carolina
                          </option>
                          <option value="ND">
                            North Dakota
                          </option>
                          <option value="OH">
                            Ohio
                          </option>
                          <option value="OK">
                            Oklahoma
                          </option>
                          <option value="OR">
                            Oregon
                          </option>
                          <option value="PA">
                            Pennsylvania
                          </option>
                          <option value="RI">
                            Rhode Island
                          </option>
                          <option value="SC">
                            South Carolina
                          </option>
                          <option value="SD">
                            South Dakota
                          </option>
                          <option value="TN">
                            Tennessee
                          </option>
                          <option value="TX">
                            Texas
                          </option>
                          <option value="UT">
                            Utah
                          </option>
                          <option value="VT">
                            Vermont
                          </option>
                          <option value="VA">
                            Virginia
                          </option>
                          <option value="WA">
                            Washington
                          </option>
                          <option value="WV">
                            West Virginia
                          </option>
                          <option value="WI">
                            Wisconsin
                          </option>
                          <option value="WY">
                            Wyoming
                          </option>
                        </select>
                        <div class="clearfix">
                        </div>
                        <button>
                          Get A Qoute
                        </button>
                      </form>
                    </div> -->
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <!-- <div class="shippingbox">
                      <h5>
                        Discount Codes
                      </h5>
                      <form>
                        <label>
                          Enter your coupon code if you have one
                        </label>
                        <input type="text" name="">
                        <div class="clearfix">
                        </div>
                        <button>
                          Get A Qoute
                        </button>
                      </form>
                    </div> -->
                  </div>
                  <div class="col-md-5 col-sm-6">
                    <div class="shippingbox">
                      <div class="subtotal">
                        <h5>
                          Tổng tiền
                        </h5>
                        <span>
                          <?php echo number_format($total, 0, '', ',');?>
                          <small style="color: red"> vnđ</small>
                        </span>
                      </div>
                      <div class="grandtotal">
                        <h5>
                          Tổng tiền (VAT)
                        </h5>
                        <span class="currency">
                          <?php 
                            $total = $total + 0.1 * $total;
                            echo number_format($total, 0, '', ',');
                          ?>
                        <small style="color: red"> vnđ</small>
                        </span>
                      </div>
                      <button onclick="location.href='index.php'" style="float: left;">
                        Tiếp tục mua hàng
                      </button>
                      <button id="btnCheckout" style="float: right;">
                        Đặt hàng
                      </button>
                    </div>
                  </div>
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