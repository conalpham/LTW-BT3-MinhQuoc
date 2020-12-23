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
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php include('header.php');?>

<div class="container-fluid">
    <h2>Danh sách đơn nhập</h2>
    <div class="form-search">
        <div class="row">
            <div class="col-md-6 col-xl-6">
                <div class="search">
                    <label class="label-search">Từ khóa:</label>
                    <input class="input-search" placeholder="Nhập tên nhà cung cấp" type='text'/>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="search">
                    <label class="label-search">Trạng thái:</label>
                    <select class="select-form input-search">
                        <option>Tẩt cả</option>
                        <option>Chờ xác nhận</option>
                        <option>Đang giao hàng</option>
                        <option>Đã giao hàng</option>
                        <option>Yêu cầu trả hàng</option>
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
                <button class="btn btn-primary" style="float: right">Tìm</button>
            </div>
        </div>
    </div>
    <div>
        <label>Số bản ghi: </label>
        <select>
            <option>5</option>
            <option>10</option>
            <option>20</option>
            <option>30</option>
            <option>50</option>
        </select>
    </div>
    <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã hóa đơn</th>
            <th>Thời gian</th>
            <th>Nhà cung cấp</th>
            <th>Địa chỉ nhà cung cấp</th>
            <th>Tổng tiền hàng</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>HD000046</td>
            <td>17/10/2020 23:53</td>
            <td>NXB Thượng Đình</td>
            <td>Anh Giang - Kim Mã</td>
            <td>483,000&dstrok;</td>
            <td>
                <span class="badge label label-primary">Chờ xác nhận</span>
            </td>
            <td>
                <i class="glyphicon glyphicon-eye-open" style="color: #0090da; cursor: pointer" title="Xem chi tiết" data-toggle="modal" data-target="#detailHD000046"></i>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>HD000047</td>
            <td>17/10/2020 23:53</td>
            <td>NXB Kim Đồng</td>
            <td>Anh Giang - Kim Mã</td>
            <td>483,000&dstrok;</td>
            <td>
                <span class="badge label label-primary">Chờ xác nhận</span>
            </td>
            <td>
                <i class="glyphicon glyphicon-eye-open" style="color: #0090da; cursor: pointer" title="Xem chi tiết" data-toggle="modal" data-target="#detailHD000047"></i>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>HD000048</td>
            <td>17/10/2020 23:53</td>
            <td>NXB Sao Mai</td>
            <td>Anh Giang - Kim Mã</td>
            <td>483,000&dstrok;</td>
            <td>
                <span class="badge label label-info">Đang giao hàng</span>
            </td>
            <td>
                <i class="glyphicon glyphicon-eye-open" style="color: #0090da; cursor: pointer" title="Xem chi tiết" data-toggle="modal" data-target="#detailHD000048"></i>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>HD000049</td>
            <td>17/10/2020 23:53</td>
            <td>NXB Liên Đỉnh</td>
            <td>Anh Giang - Kim Mã</td>
            <td>483,000&dstrok;</td>
            <td>
                <span class="badge label label-success">Đã giao hàng</span>
            </td>
            <td>
                <i class="glyphicon glyphicon-eye-open" style="color: #0090da; cursor: pointer" title="Xem chi tiết" data-toggle="modal" data-target="#detailHD000049"></i>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>HD000050</td>
            <td>17/10/2020 23:53</td>
            <td>NXB Minh Quốc</td>
            <td>Anh Giang - Kim Mã</td>
            <td>483,000&dstrok;</td>
            <td>
                <span class="badge label label-warning">Yêu cầu trả hàng</span>
            </td>
            <td>
                <i class="glyphicon glyphicon-eye-open" style="color: #0090da; cursor: pointer" title="Xem chi tiết" data-toggle="modal" data-target="#detailHD000050"></i>
            </td>
        </tr>

        </tbody>
    </table>
    <div>
        <span>Hiển thị 5 của 13 bản tin</span>
        <div class="pagination">
            <a href="Import.php">&laquo;</a>
            <a href="Import.php" class="active">1</a>
            <a href="Import.php">2</a>
            <a href="Import.php">3</a>
            <a href="Import.php">4</a>
            <a href="Import.php">5</a>
            <a href="Import.php">6</a>
            <a href="Import.php">&raquo;</a>
        </div>
    </div>
</div>

<footer class="text-center">
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
</footer>

<!-- Modal -->
<div id="detailHD000046" class="modal fade" role="dialog">
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
                        <label class="label-search">Mã hóa đơn: </label> <span>HD000046</span><br/>
                        <label class="label-search">Mã nhà cung cấp: </label> <span>NCC00001</span><br/>
                        <label class="label-search">Họ tên: </label> <span>NXB Thượng Đình</span><br/>
                        <label class="label-search">Thời gian: </label> <span>17/10/2020 23:53</span><br/>
                        <label class="label-search">Địa chỉ: </label> <span>Anh Giang - Kim Mã</span><br/>
                        <label class="label-search">Trạng thái: </label> <span class="badge label label-primary">Chờ xác nhận</span>
                        <label class="label-search">Tổng tiền: </label> <span>483,000&dstrok;</span>
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
                        <label class="label-search">Mã hóa đơn: </label> <span>HD000046</span><br/>
                        <label class="label-search">Mã nhà cung cấp: </label> <span>NCC00002</span><br/>
                        <label class="label-search">Họ tên: </label> <span>NXB Kim Đồng</span><br/>
                        <label class="label-search">Thời gian: </label> <span>17/10/2020 23:53</span><br/>
                        <label class="label-search">Địa chỉ: </label> <span>Anh Giang - Kim Mã</span><br/>
                        <label class="label-search">Trạng thái: </label> <span class="badge label label-primary">Chờ xác nhận</span>
                        <label class="label-search">Tổng tiền: </label> <span>483,000&dstrok;</span>
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
<div id="detailHD000048" class="modal fade" role="dialog">
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
                        <label class="label-search">Mã hóa đơn: </label> <span>HD000046</span><br/>
                        <label class="label-search">Mã nhà cung cấp: </label> <span>NCC00003</span><br/>
                        <label class="label-search">Họ tên: </label> <span>NXB Sao Mai</span><br/>
                        <label class="label-search">Thời gian: </label> <span>17/10/2020 23:53</span><br/>
                        <label class="label-search">Địa chỉ: </label> <span>Anh Giang - Kim Mã</span><br/>
                        <label class="label-search">Trạng thái: </label> <span class="badge label label-info">Đang giao hàng</span>
                        <label class="label-search">Tổng tiền: </label> <span>483,000&dstrok;</span>
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
<div id="detailHD000049" class="modal fade" role="dialog">
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
                        <label class="label-search">Mã hóa đơn: </label> <span>HD000046</span><br/>
                        <label class="label-search">Mã nhà cung cấp: </label> <span>NCC00004</span><br/>
                        <label class="label-search">Họ tên: </label> <span>NXB Liên Đỉnh</span><br/>
                        <label class="label-search">Thời gian: </label> <span>17/10/2020 23:53</span><br/>
                        <label class="label-search">Địa chỉ: </label> <span>Anh Giang - Kim Mã</span><br/>
                        <label class="label-search">Trạng thái: </label> <span class="badge label label-success">Đã giao hàng</span>
                        <label class="label-search">Tổng tiền: </label> <span>483,000&dstrok;</span>
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
<div id="detailHD000050" class="modal fade" role="dialog">
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
                        <label class="label-search">Mã hóa đơn: </label> <span>HD000046</span><br/>
                        <label class="label-search">Mã nhà cung cấp: </label> <span>NCC00005</span><br/>
                        <label class="label-search">Họ tên: </label> <span>NXB Minh Quốc</span><br/>
                        <label class="label-search">Thời gian: </label> <span>17/10/2020 23:53</span><br/>
                        <label class="label-search">Địa chỉ: </label> <span>Anh Giang - Kim Mã</span><br/>
                        <label class="label-search">Trạng thái: </label> <span class="badge label label-warning">Yêu cầu trả hàng</span>
                        <label class="label-search">Tổng tiền: </label> <span>483,000&dstrok;</span>
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

<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function () {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });

        $(window).scroll(function () {
            $(".slideanim").each(function () {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });

        var checkin = $('#fromDate').datepicker({format: "dd/mm/yyyy"});
        checkin.data('datepicker').setDate(new Date());
        checkin.on('changeDate', function (ev) {
            if (ev.date > checkout.viewDate) {
                var newDate = new Date(ev.date)
                checkout.setDate(newDate);
            }
            $('#toDate').datepicker('setStartDate', $('#fromDate').datepicker('getDate'))
            $('#toDate')[0].focus();
        });
        var checkout = $('#toDate').datepicker({format: "dd/mm/yyyy"}).data('datepicker');
        checkout.setDate(new Date());
    })
</script>
</body>
</html>
