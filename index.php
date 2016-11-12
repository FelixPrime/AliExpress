<?php

require_once 'aliexpress/AliExpress.php';

$ali = new AliExpress();

//get category list
$catList = $ali->getListCategory();

//get product list by categoryID
//sort: commissionRateDown
//filter: commissionRateFrom from 0.5
$productListByCategory = $ali->getListProduct(100002612, array('sort'=>'commissionRateDown', 'commissionRateFrom'=>0.5));

//get product list by Keyword
$productListByKeyword = $ali->getListProduct('shoes');

//get product list by CategoryID and Keyword
//filter: commissionRateFrom from 0.5
$productList = $ali->getListProduct(322, array('keywords'=>'man shoes', 'commissionRateFrom'=>0.5));

//get product by ID
$product = $ali->getProduct(32213749383);

//get promotion link(s)
$link = $ali->getPromotionLinks('<your_tracking_ID>', "http://www.aliexpress.com/item//32213749383.html,http://www.aliexpress.com/item//1786034050.html");
