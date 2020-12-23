<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flat Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    // chart
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    // datepicker
    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    // css custom
    <link rel="stylesheet" href="css/Style.css" type="text/css">
    <link rel="stylesheet" href="css/Bill.css" type="text/css">
    <link rel="stylesheet" href="css/Timeline.css" type="text/css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    
<?php include('header.php');?>

<div class="container-fluid">
    <h2>Danh sách đơn hàng</h2>
    <div class="form-search">
        <div class="row">
            <div class="col-md-6 col-xl-6">
                <div class="search">
                    <label class="label-search">Từ khóa:</label>
                    <input class="input-search" id="input-key" placeholder="Nhập tên khách hàng" type='text'/>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="search">
                    <label class="label-search">Trạng thái:</label>
                    <select class="select-form input-search" id="input-status">
                        <option value="0" checked>Tất cả</option>
                        <option value="1">Chờ xác nhận</option>
                        <option value="2">Chờ lấy hàng</option>
                        <option value="3">Đang giao hàng</option>
                        <option value="4">Đã giao hàng</option>
                        <option value="5">Yêu cầu trả hàng</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="search">
                    <label class="label-search">Từ ngày:</label>
                    <div class='input-group date input-search' id='fromDate' data-date-format="dd/mm/yyyy">
                        <input style="width: 100%" type="text" placeholder="dd/mm/yyyy">
                        <span class="input-group-addon" style="border: solid 1px; border-left: none;border-radius: 0;">
                           <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="search">
                    <label class="label-search">Đến ngày:</label>
                    <div class='input-group date input-search' id='toDate' data-date-format="dd/mm/yyyy">
                        <input style="width: 100%" type="text" placeholder="dd/mm/yyyy">
                        <span class="input-group-addon" style="border: solid 1px; border-left: none;border-radius: 0;">
                           <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col">
                <button class="btn" style="float: right; margin-right: 15px">Đặt lại</button>
                <button class="btn btn-primary" style="float: right" onclick="searchBill();">Tìm</button>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Thời gian</th>
            <th>Khách hàng</th>
            <th>Địa chỉ khách hàng</th>
            <th>Tổng tiền hàng</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody class='table-content'>

        </tbody>
    </table>
    <div>
        <span class="sum-text">Hiển thị 5 của 13 đơn hàng</span>
        <div class="pagination">
            <!-- <a href="Bill.php">&laquo;</a> -->
            <a href="Bill.php" class="active">1</a>
            <a href="Bill.php">2</a>
            <a href="Bill.php">3</a>
            <a href="Bill.php">4</a>
            <a href="Bill.php">5</a>
            <a href="Bill.php">6</a>
            <!-- <a href="Bill.php">&raquo;</a> -->
        </div>
    </div>
</div>

<footer class="text-center">
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
</footer>

<!-- Modal -->
<div class="list-modal">
    <div id="detailHD000047" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="top: 45px">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"><b>Chi tiết</b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="label-search">Mã hóa đơn: </label> <span>HD000047</span><br/>
                            <label class="label-search">Mã khách hàng: </label> <span>KH000002</span><br/>
                            <label class="label-search">Họ tên: </label> <span>Lê Thị Ngân</span><br/>
                            <label class="label-search">Thời gian: </label> <span>17/10/2020 23:53</span><br/>
                            <label class="label-search">Địa chỉ: </label> <span>Anh Giang - Kim Mã</span><br/>
                            <label class="label-search">Tổng tiền: </label> <span>483,000&dstrok;</span>
                            <label class="label-search">Trạng thái: </label> <br/> 
                            <!--  -->
                            <section class="timeline">
                                <ol>
                                    <li title="20/03/2020" style="cursor: pointer">
                                        <div class="badge label label-primary">Chờ xác nhận1</div>
                                    </li>
                                    <li>
                                        <div class="badge label label-primary">Chờ xác nhận2</div>
                                    </li>
                                    <li>
                                        <div class="badge label label-primary">Chờ xác nhận3</div>
                                    </li>
                                    <li class="not-active">
                                        <div class="badge label label-primary">Chờ xác nhận4</div>
                                    </li>
                                    <li class="not-active">
                                        <div class="badge label label-primary">Chờ xác nhận5</div>
                                    </li>
                                    <li class="not-active">
                                        <div class="badge label label-primary">Chờ xác nhận6</div>
                                    </li>
                                    
                                </ol>
                                
                                <div class="arrows">
                                    <button class="arrow arrow__prev disabled" disabled>
                                    <img class="arrowImg" src="image/arrow_prev.svg" alt="prev timeline arrow">
                                    </button>
                                    <button class="arrow arrow__next">
                                    <img class="arrowImg" src="image/arrow_next.svg" alt="next timeline arrow">
                                    </button>
                                </div>
                            </section>
                        </div>
                        <div style="border-left: 1px solid;" class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label>Danh sách sản phẩm</label>
                            <ol class="list-goods">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                            <img src="image/goods/de-men-phieu-luu-ky.jpeg" width="50" height="50">
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-lg-10">
                                            <span>Dễ Mèn Phiêu Lưu Ký - <i>Tô Hoài</i> </span><br/>
                                            <span>x1</span>
                                            <span style="float: right; color: red">83.000&dstrok;</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                            <img src="image/goods/mat-biec.jpeg" width="50" height="50">
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-lg-10">
                                            <span>Mắt Biếc - <i>Nguyễn Nhật Ánh</i> </span><br/>
                                            <span>x1</span>
                                            <span style="float: right; color: red">100.000&dstrok;</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                            <img src="image/goods/cho-toi-xin-mot-ve-di-tuoi-tho.jpeg" width="50" height="50">
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-lg-10">
                                            <span>Cho Tôi Xin Một Vé Đi Tuổi Thơ - <i>Nguyễn Nhật Ánh</i> </span><br/>
                                            <span>x1</span>
                                            <span style="float: right; color: red">100.000&dstrok;</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                            <img src="image/goods/toi-tai-gioi-ban-cung-the.jpeg" width="50" height="50">
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-lg-10">
                                            <span>Tôi Tài Giỏi Bạn Cũng Thế - <i>Adam Khoo</i> </span><br/>
                                            <span>x1</span>
                                            <span style="float: right; color: red">100.000&dstrok;</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                            <img src="image/goods/truyen-kieu.jpeg" width="50" height="50">
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-lg-10">
                                            <span>Truyện Kiều - <i>Nguyễn Du</i> </span><br/>
                                            <span>x1</span>
                                            <span style="float: right; color: red">100.000&dstrok;</span>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Xác nhận</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>


    </div>
</div>
</body>
<script type="text/javascript">
    window.onload = function() {
        searchBill();
    }
</script>
</html>
<?php include('footer.php'); ?>