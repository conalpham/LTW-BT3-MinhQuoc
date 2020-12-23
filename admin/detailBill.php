<?php
    $idBill =  $_GET['idBill'];
    include('../lib/dao.php');
    $dao = new Dao();
    $bill = $dao->getBill($idBill);
    $listStatus = $dao->getListStatus($idBill);
    $listItem = $dao->getListItem($idBill);
    $dt = '
    <div id=\'HD0'. $idBill .'\' class="modal fade" role="dialog">
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
                            <label class="label-search">Mã hóa đơn: </label> <span>HD0'.$idBill.'</span><br/>
                            <label class="label-search">Mã khách hàng: </label> <span>KH0'.$bill['idCustomer'].'</span><br/>
                            <label class="label-search">Họ tên: </label> <span>'.$bill['fullname'].'</span><br/>
                            <label class="label-search">Thời gian: </label> <span>'.$bill['createdAt'].'</span><br/>
                            <label class="label-search">Địa chỉ: </label> <span>'.$bill['address'].'</span><br/>
                            <label class="label-search">Tổng tiền: </label> <span style="color:red">'.number_format($bill['amount'], 0, '', ',').'&dstrok;</span>
                            <label class="label-search">Trạng thái: </label> <br/> 
                            <!--  -->
                            <section class="timeline">
                                <ol>
                                    <li style="cursor: pointer" title="'.$bill['createdAt'].'">
                                        <div class="badge label label-primary">Chờ xác nhận</div>
                                    </li>
                                    <li style="cursor: pointer" '.(($bill['currentStatus'] < 2) ? 'class="not-active"': 'title="'.$listStatus[1]['date'].'"').''.(($bill['currentStatus'] == 1) ? 'onclick="updateBillStatus('.$idBill.',2)"' : '').'>
                                        <div class="badge label label-info">Chờ lấy hàng</div>
                                    </li>
                                    <li style="cursor: pointer" '.(($bill['currentStatus'] < 3) ? 'class="not-active"': 'title="'.$listStatus[2]['date'].'"').''.(($bill['currentStatus'] == 2) ? 'onclick="updateBillStatus('.$idBill.',3)"' : '').'>
                                        <div class="badge label label-warning">Đang giao</div>
                                    </li>
                                    <li style="cursor: pointer" '.(($bill['currentStatus'] < 4) ? 'class="not-active"': 'title="'.$listStatus[3]['date'].'"').''.(($bill['currentStatus'] == 3) ? 'onclick="updateBillStatus('.$idBill.',4)"' : '').'>
                                        <div class="badge label label-success">Đã giao hàng</div>
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
    ';
    foreach($listItem as $item) {
                        $total = $item['amount'] * ($item['price'] - $item['price'] * $item['discount'] / 100);
                        $dt .= '
                                <li>
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2">
                                            <img src="'.$item['imageUrl'].'" width="50" height="50">
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-lg-10">
                                            <span>'.$item['name'].'</span><br/>
                                            <span>x'.$item['amount'].'</span>
                                            <span style="float: right; color: red">'.number_format($total, 0, '', ',').'&dstrok;</span>
                                        </div>
                                    </div>
                                </li>
                        ';
    }
    $dt .='                 </ol>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
    ';

    switch ($bill['currentStatus']) {
        case 1: {
            $dt .='
                            <button onclick="updateBillStatus('.$idBill.',2)" type="button" class="btn btn-primary" data-dismiss="modal">Xác nhận</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>

                </div>
            </div>
            ';
            break;
        }
        case 2: {
            $dt .='
                            <button onclick="updateBillStatus('.$idBill.',3)" type="button" class="btn btn-primary" data-dismiss="modal">Đã lấy hàng</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>

                </div>
            </div>
            ';
            break;
        }
        case 3: {
            $dt .='
                            <button onclick="updateBillStatus('.$idBill.',4)" type="button" class="btn btn-primary" data-dismiss="modal">Đã giao hàng</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>

                </div>
            </div>
            ';
            break;
        }
        case 4: {
            $dt .='
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>

                </div>
            </div>
            ';
            break;
        }

    }
echo $dt;
?>