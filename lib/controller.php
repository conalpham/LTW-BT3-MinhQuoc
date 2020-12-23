<?php
include_once('dao.php');
session_start();

$dao = new DAO();
if (isset($_GET['q'])) {
    $q = $_GET['q'];
} else {
    $q = "";
}
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array(); 
    $_SESSION['sum_Cart'] = 0;
}

switch ($q) {
    case 'verify': {
        $dao->verify();
        break;
    }
    case 'logout': {
        $dao->logout();
        break;
    }
    case 'add-to-cart': {
        $dao->addToCart();
        break;
    }
    case 'remove-item-in-cart': {
        $dao->removeItemInCart();
        break;
    }
    case 'count-cart': {
        $dao->countCart();
        break;
    }
    case 'get-list-item-in-cart': {
        $dao->getListItemInCart();
        break;
    }
    case 'checkout': {
        $dao->checkout();
        break;
    }
    case 'search-bill': {
        $dao->searchBill();
        break;
    }
    case 'count-bill': {
        $dao->countBill();
        break;
    }
    case 'update-status-bill': {
        $dao->updateStatusBill();
        break;
    }
    case 'report': {
        $dao->report();
        break;
    }
    case 'top-customer': {
        $dao->topCustomer();
        break;
    }
    case 'top-item': {
        $dao->topItem();
        break;
    }
}
?>