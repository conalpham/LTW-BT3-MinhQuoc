<?php
    class DAO {
        private $conn;
        public function __construct() {
            include('dbCon.php');
            $this->conn = $conn;
            date_default_timezone_set("Asia/Bangkok");
        }
    
        function verify() {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $qr = "
                SELECT * FROM user WHERE username = '$username' AND password = '$password'
            ";
            $result = mysqli_query($this->conn,$qr);
            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_array($result);
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['role'] = $user['role'];
            }
            echo mysqli_num_rows($result);
        }
    
        function logout() {
            session_start();
            session_destroy();
            header('location:../login.php');
        }
    
        function getHotItem() {
            $qr = "
                SELECT * FROM item ORDER BY liked DESC LIMIT 0,8
            ";
            $result = mysqli_query($this->conn,$qr);
    
            if ($result) {
                $results_array = array();
    
                while ($row = mysqli_fetch_array($result)) {
                    array_push($results_array,$row);
                }
    
                return $results_array;
            }
            return null;
        }

        function getDiscountItem() {
            $qr = "
                SELECT * FROM `item` WHERE discount > 0 ORDER BY discount DESC LIMIT 0,8
            ";
            $result = mysqli_query($this->conn,$qr);
    
            if ($result) {
                $results_array = array();
    
                while ($row = mysqli_fetch_array($result)) {
                    array_push($results_array,$row);
                }
    
                return $results_array;
            }
            return null;
        }

        function addToCart() {
            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array(); 
            }
            if(!isset($_SESSION['sum'])) {
                $_SESSION['sum'] = 0;
            }
           
            $itemId = $_POST['itemId'];
            if (!isset($_SESSION['cart'][$itemId])) {
                $_SESSION['cart'][$itemId] = 1;
            } else {
                $_SESSION['cart'][$itemId] = $_SESSION['cart'][$itemId] + 1;
            }
            $_SESSION['sum'] = $_SESSION['sum'] + 1;
            echo $_SESSION['sum'];
        }

        function countCart() {
            if(!isset($_SESSION['sum'])) {
                $_SESSION['sum'] = 0;
            }
            echo $_SESSION['sum'];
        }

        function removeItemInCart() {
            $itemId = $_POST['itemId'];
            $_SESSION['sum'] = $_SESSION['sum'] - $_SESSION['cart'][$itemId];
            unset($_SESSION['cart'][$itemId]);
            echo true;
        }

        function getListItemInCart() {
            $dt = "";
            $total = 0;
            if ($_SESSION['sum'] != 0) {
                foreach($_SESSION['cart'] as $key => $value) {
                    if ($value != 0) {
                        $qr = "
                            SELECT * FROM item WHERE id = '$key'
                        ";
                        $result = mysqli_query($this->conn, $qr);
                        $row = mysqli_fetch_array($result);
                        $price = $row['price'] - $row['price'] * $row['discount'] / 100;
                        $total = $total + $value * $price;
                        $dt .= '
                            <li>
                                <div class="cart-item">
                                    <div class="image"><img src="'.$row['imageUrl'].'" alt=""></div>
                                    <div class="item-description">
                                        <p class="name">'.$row['name'].'</p>
                                        <p>Kích thước: <span class="light-red">One size</span><br>Số lượng: <span class="light-red">'.$value.'</span></p>
                                    </div>
                                    <div class="right">
                                        <p class="price">'.number_format($price, 0, '', ',').'<small style="color: red"> vnđ</small></p>
                                        <a onclick = removeItemInCart('.$key.') style="cursor: pointer;" class="remove"><img src="images/remove.png" alt="remove"></a>
                                    </div>
                                </div>
                            </li>
                        ';
                    }
                }
                $dt .= '
                        <li><span class="total">Tổng <strong>'.number_format($total, 0, '', ',').'<small style="color: red"> vnđ</small></strong></span><button class="checkout" onClick="location.href='.'\'checkout.php\''.'">Đặt hàng</button></li>
                    ';
            } else {
                $dt = '
                    <div style="text-align: center;">Bạn chưa chọn sản phẩm nào!</div>
                ';
            }
            echo $dt;
        }

        function getItemById($id) {
            $qr = "
                SELECT * FROM item WHERE id = '$id'
            ";
            $result = mysqli_query($this->conn, $qr);
            $row = mysqli_fetch_array($result);
            return $row;
        }

        function getTotalAmount() {
            $total = 0;
            foreach($_SESSION['cart'] as $key => $value) {
                $cart = $this->getItemById($key);
                $total += ($cart['price'] - $cart['price'] * $cart['discount'] / 100) * $value;
            }
            return $total;
        }

        function checkout() {
            $total = $this->getTotalAmount();
            $total = $total + 0.1 * $total;
            $idUser = $_SESSION['id'];
            $qr = "
                INSERT INTO bill (idCustomer, amount) VALUES('$idUser','$total')
            ";
            if (mysqli_query($this->conn, $qr)) {
                $idBill = mysqli_insert_id($this->conn);
                foreach($_SESSION['cart'] as $key => $value) {
                    $qr = "
                            INSERT INTO ordered_item (idItem, idBill, amount) VALUES('$key','$idBill','$value')
                        ";
                    mysqli_query($this->conn, $qr);
                }
                $date = date('Y-m-d H:i:s');
                $qr = "
                        INSERT INTO status_bill (status, idBill, date) VALUES('1','$idBill','$date')
                    ";
                mysqli_query($this->conn, $qr);
                $_SESSION['cart'] = array();
                $_SESSION['sum'] = 0;
                echo true;
            } else {
                echo false;
            }
        }

        function countBill() {
            $page = $_GET['page'];
            $perpage = $_GET['perpage'];
            $index = ($page - 1) * $perpage;
            $key = $_GET['key'];
            $fromDate = $_GET['fromDate'];
            $toDate = $_GET['toDate'];
            $status = $_GET['status'];
            if ($status != 0) {
                $qr = "
                    SELECT COUNT(*) as sum 
                    FROM
                        (SELECT status_bill.date, user.fullname, user.address, bill.amount, status_bill.idBill 
                            FROM bill, status_bill, user
                            WHERE bill.id = status_bill.idBill
                            AND status_bill.status = 1
                            AND status_bill.date <= '$toDate'
                            AND status_bill.date >= '$fromDate'
                            AND bill.idCustomer = user.id
                            AND user.fullname LIKE '%$key%') as x,
                        (SELECT status_bill.idBill, MAX(status_bill.status) as currentStatus 
                            FROM status_bill, bill
                            WHERE status_bill.idBill = bill.id
                            GROUP BY status_bill.idBill) as y
                    WHERE
                        x.idBill = y.idBill
                    AND y.currentStatus = $status
                    LIMIT $index, $perpage
                ";
            } else {
                $qr = "
                    SELECT COUNT(*) as sum 
                    FROM
                        (SELECT status_bill.date, user.fullname, user.address, bill.amount, status_bill.idBill 
                            FROM bill, status_bill, user
                            WHERE bill.id = status_bill.idBill
                            AND status_bill.status = 1
                            AND status_bill.date <= '$toDate'
                            AND status_bill.date >= '$fromDate'
                            AND bill.idCustomer = user.id
                            AND user.fullname LIKE '%$key%') as x,
                        (SELECT status_bill.idBill, MAX(status_bill.status) as currentStatus 
                            FROM status_bill, bill
                            WHERE status_bill.idBill = bill.id
                            GROUP BY status_bill.idBill) as y
                    WHERE
                        x.idBill = y.idBill
                    LIMIT $index, $perpage
                ";
            }
            $result = mysqli_query($this->conn,$qr);
            $row = mysqli_fetch_array($result);
            echo $row['sum'];
        }

        function searchBill() {
            $page = $_GET['page'];
            $perpage = $_GET['perpage'];
            $index = ($page - 1) * $perpage;
            $key = $_GET['key'];
            $fromDate = $_GET['fromDate'];
            $toDate = $_GET['toDate'];
            $status = $_GET['status'];
            if ($status != 0) {
                $qr = "
                    SELECT x.fullname, x.address, x.amount, x.idBill, x.idCustomer, y.currentStatus, x.date as createdAt 
                    FROM
                        (SELECT status_bill.date, user.fullname, user.address, bill.amount, bill.idCustomer, status_bill.idBill 
                            FROM bill, status_bill, user
                            WHERE bill.id = status_bill.idBill
                            AND status_bill.status = 1
                            AND status_bill.date <= '$toDate'
                            AND status_bill.date >= '$fromDate'
                            AND bill.idCustomer = user.id
                            AND user.fullname LIKE '%$key%') as x,
                        (SELECT status_bill.idBill, MAX(status_bill.status) as currentStatus 
                            FROM status_bill, bill
                            WHERE status_bill.idBill = bill.id
                            GROUP BY status_bill.idBill) as y
                    WHERE
                        x.idBill = y.idBill
                    AND y.currentStatus = $status
                    LIMIT $index, $perpage
                ";
            } else {
                $qr = "
                    SELECT x.fullname, x.address, x.amount, x.idBill, x.idCustomer, y.currentStatus, x.date as createdAt 
                    FROM
                        (SELECT status_bill.date, user.fullname, user.address, bill.idCustomer, bill.amount, status_bill.idBill 
                            FROM bill, status_bill, user
                            WHERE bill.id = status_bill.idBill
                            AND status_bill.status = 1
                            AND status_bill.date <= '$toDate'
                            AND status_bill.date >= '$fromDate'
                            AND bill.idCustomer = user.id
                            AND user.fullname LIKE '%$key%') as x,
                        (SELECT status_bill.idBill, MAX(status_bill.status) as currentStatus 
                            FROM status_bill, bill
                            WHERE status_bill.idBill = bill.id
                            GROUP BY status_bill.idBill) as y
                    WHERE
                        x.idBill = y.idBill
                    LIMIT $index, $perpage
                ";
            }

            $result = mysqli_query($this->conn,$qr);
    
            if ($result) {
                $results_array = array();
    
                while ($row = mysqli_fetch_assoc($result)) {
                    $row['amount'] = number_format($row['amount'], 0, '', ',');
                    array_push($results_array,$row);
                }

                header('Content-type: application/json'); 
                echo json_encode($results_array);
            }
        }

        function getBill($idBill) {
            $qr = "
                SELECT x.fullname, x.address, x.amount, x.idBill, x.idCustomer, y.currentStatus, x.date as createdAt 
                FROM
                    (SELECT status_bill.date, user.fullname, user.address, bill.idCustomer, bill.amount, status_bill.idBill 
                    FROM bill, status_bill, user
                    WHERE bill.id = status_bill.idBill
                    AND status_bill.status = 1
                    AND bill.idCustomer = user.id) as x,
                    (SELECT status_bill.idBill, MAX(status_bill.status) as currentStatus 
                    FROM status_bill, bill
                    WHERE status_bill.idBill = bill.id
                    GROUP BY status_bill.idBill) as y
                WHERE
                    x.idBill = y.idBill
                AND x.idBill = $idBill
            ";
            $result = mysqli_query($this->conn, $qr);
            $row = mysqli_fetch_array($result);
            return $row;
        }

        function getListStatus($idBill) {
            $qr = "
                SELECT status_bill.* 
                FROM bill, status_bill
                WHERE bill.id = status_bill.idBill
                AND   bill.id = '$idBill'
            ";
            $result = mysqli_query($this->conn, $qr);
            if ($result) {
                $results_array = array();
    
                while ($row = mysqli_fetch_array($result)) {
                    array_push($results_array,$row);
                }
    
                return $results_array;
            }
            return null;
        }

        function getListItem($idBill) {
            $qr = "
                SELECT item.*, ordered_item.amount
                FROM bill, ordered_item, item
                WHERE bill.id = ordered_item.idBill
                AND   ordered_item.idItem = item.id
                AND bill.id = '$idBill'
            ";
            
            $result = mysqli_query($this->conn,$qr);
    
            if ($result) {
                $results_array = array();
    
                while ($row = mysqli_fetch_array($result)) {
                    array_push($results_array,$row);
                }
    
                return $results_array;
            }
            return null;
        }

        function updateStatusBill() {
            $idBill = $_POST['idBill'];
            $status = $_POST['status'];
            $date = date('Y-m-d H:i:s');
            $qr = "
                    INSERT INTO status_bill (status, idBill, date) VALUES('$status','$idBill','$date')
                ";
            echo $qr;
            $result = mysqli_query($this->conn, $qr);
            echo $result;
        }

        function report() {
            $page = $_GET['page'];
            $perpage = $_GET['perpage'];
            $index = ($page - 1) * $perpage;
            $key = $_GET['key'];
            $fromDate = $_GET['fromDate'];
            $toDate = $_GET['toDate'];
            $status = $_GET['status'];
            if ($status != 0) {
                $qr = "
                    SELECT x.fullname, x.address, x.amount, x.idBill, x.idCustomer, y.currentStatus, x.date as createdAt, SUM(x.amount) as totalAmount
                    FROM
                        (SELECT status_bill.date, user.fullname, user.address, bill.amount, bill.idCustomer, status_bill.idBill 
                            FROM bill, status_bill, user
                            WHERE bill.id = status_bill.idBill
                            AND status_bill.status = 1
                            AND status_bill.date <= '$toDate'
                            AND status_bill.date >= '$fromDate'
                            AND bill.idCustomer = user.id
                            AND user.fullname LIKE '%$key%') as x,
                        (SELECT status_bill.idBill, MAX(status_bill.status) as currentStatus 
                            FROM status_bill, bill
                            WHERE status_bill.idBill = bill.id
                            GROUP BY status_bill.idBill) as y
                    WHERE
                        x.idBill = y.idBill
                    AND y.currentStatus = $status
                    LIMIT $index, $perpage
                ";
            } else {
                $qr = "
                    SELECT x.fullname, x.address, x.amount, x.idBill, x.idCustomer, y.currentStatus, x.date as createdAt, SUM(x.amount) as totalAmount, COUNT(*) as sum
                    FROM
                        (SELECT status_bill.date, user.fullname, user.address, bill.idCustomer, bill.amount, status_bill.idBill 
                            FROM bill, status_bill, user
                            WHERE bill.id = status_bill.idBill
                            AND status_bill.status = 1
                            AND status_bill.date <= '$toDate'
                            AND status_bill.date >= '$fromDate'
                            AND bill.idCustomer = user.id
                            AND user.fullname LIKE '%$key%') as x,
                        (SELECT status_bill.idBill, MAX(status_bill.status) as currentStatus 
                            FROM status_bill, bill
                            WHERE status_bill.idBill = bill.id
                            GROUP BY status_bill.idBill) as y
                    WHERE
                        x.idBill = y.idBill
                    LIMIT $index, $perpage
                ";
            }

            $result = mysqli_query($this->conn,$qr);
    
            if ($result) {
                $results_array = array();
    
                while ($row = mysqli_fetch_assoc($result)) {
                    $row['amount'] = number_format($row['amount'], 0, '', ',');
                    settype($row['totalAmount'], 'integer');
                    array_push($results_array,$row);
                }

                header('Content-type: application/json'); 
                echo json_encode($results_array);
            }
        }

        function topCustomer() {
            $qr = "
                SELECT USER.*, SUM(bill.amount) as totalAmount
                FROM user, bill
                WHERE user.id = bill.idCustomer
                GROUP BY user.id
                ORDER BY SUM(bill.amount) DESC
                LIMIT 0,5
            ";
            $result = mysqli_query($this->conn,$qr);
    
            if ($result) {
                $results_array = array();
    
                while ($row = mysqli_fetch_assoc($result)) {
                    settype($row['totalAmount'], 'integer');
                    array_push($results_array,$row);
                }

                header('Content-type: application/json'); 
                echo json_encode($results_array);
            }
        }

        function topItem() {
            $qr = "
                SELECT item.name, SUM(ordered_item.amount) as amountItem
                FROM item, ordered_item
                WHERE item.id = ordered_item.idItem
                GROUP BY ordered_item.idItem
                ORDER BY SUM(ordered_item.amount) DESC
                LIMIT 0,10
            ";
            $result = mysqli_query($this->conn,$qr);
    
            if ($result) {
                $results_array = array();
    
                while ($row = mysqli_fetch_assoc($result)) {
                    settype($row['amountItem'], 'integer');
                    array_push($results_array,$row);
                }

                header('Content-type: application/json'); 
                echo json_encode($results_array);
            }
        }

        function getListBill() {
            $idCustomer = $_SESSION['id'];
            $qr = "
                SELECT DISTINCT x.amount, x.idBill, y.currentStatus, x.date as createdAt 
                FROM
                    (SELECT status_bill.date, user.fullname, user.address, bill.idCustomer, bill.amount, status_bill.idBill 
                        FROM bill, status_bill, user
                        WHERE bill.id = status_bill.idBill
                        AND status_bill.status = 1
                        AND bill.idCustomer = '$idCustomer') as x,
                    (SELECT status_bill.idBill, MAX(status_bill.status) as currentStatus 
                        FROM status_bill, bill
                        WHERE status_bill.idBill = bill.id
                        GROUP BY status_bill.idBill) as y
                WHERE
                    x.idBill = y.idBill
            ";
            $result = mysqli_query($this->conn,$qr);
            if ($result) {
                $results_array = array();
    
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($results_array,$row);
                }
                return $results_array;
            }
            return null;
        }
    }
?>