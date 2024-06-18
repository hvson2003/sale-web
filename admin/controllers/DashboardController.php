<?php
include("models/user.php");
include("models/product.php");
include("models/order.php");

class DashboardController
{
    public function index()
    {
        $number_product = Product::getCount();
        $number_saler = User::getCountSaler();
        $number_user = User::getCountUser();
        $revenue = Order::getRevenue();

        require 'views/dashboard/index.php';
    }
}
?>
