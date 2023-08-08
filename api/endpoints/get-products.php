<?php

$products = array();

$options['limit'] = (!empty($_POST['limit'])) ? (int) $_POST['limit'] : 35;
$options['user_id'] = (!empty($_POST['user_id'])) ? (int) $_POST['user_id'] : 0;
$options['after_id'] = (!empty($_POST['offset'])) ? (int) $_POST['offset'] : 0;
$options['c_id'] = (!empty($_POST['category_id'])) ? (int) $_POST['category_id'] : 0;
$options['keyword'] = (!empty($_POST['keyword'])) ? $_POST['keyword'] : '';
$options['length'] = (!empty($_POST['distance'])) ? $_POST['distance'] : '';

$get_products = Wo_GetProducts($options);
foreach ($get_products as $key => $product) {
    foreach ($non_allowed as $key => $value) {
       unset($product['seller'][$value]);
    }
    $products[] = $product;
}

$response_data = array(
    'api_status' => 200,
    'products' => $products
);