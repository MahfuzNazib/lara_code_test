<?php

    // Product Data Array. Insert Some demo Data
    // $productData = array([
    //     '0' => [
    //         'productId' => '1',
    //         'productName' => 'Apple',
    //         'unitPrice' => 10,
    //     ],
    //     '1' => [
    //         'productId' => '2',
    //         'productName' => 'Mango',
    //         'unitPrice' => 14,
    //     ],
    //     '2' => [
    //         'productId' => '3',
    //         'productName' => 'Watermelon',
    //         'unitPrice' => 25,
    //     ]
    // ]);

    // Product Name Array
    $productName = array('Apple', 'Mango', 'Watermelon');
    $productPrice = array (10,15,20);

    // Start Session
    session_start();
    $_SESSION['cart'] = array();

    foreach($productName as $key => $name) {
        array_push($_SESSION['cart'], $name);
    }

    print_r( $_SESSION['cart']);

?>