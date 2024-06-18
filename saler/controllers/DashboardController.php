<?php
include("models/user.php");
include("models/product.php");
include("models/order.php");

class DashboardController
{
    public function index()
    {
        $id = (isset($_SESSION['id']) ? $_SESSION['id'] : 0);
        $number_product = Product::getCountSaler();
        $revenue = Order::getRevenueSaler($id);

        require 'views/dashboard/index.php';
    }
}
?>
