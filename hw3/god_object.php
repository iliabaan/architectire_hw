<?php
/*
* Это файл с 1-го курса обучения PHP, практически все функции вынесены сюда,
* что значительно усложняет дальнейшую разработку и поддержку системы.
* Решение - ООП или хотя бы разбиение этого файла на модули по области ответственности.
*/

include './config/config.php';

function getResult($result) {
    $connect = getDb();
    return mysqli_query($connect, "SELECT * FROM `{$result}` WHERE 1");
}

// CART


function getCart() {
    $connect = getDb();
    $user_id = get_user_id();
    $user_basket = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `id`, `products`, `user_id` FROM `basket` WHERE `user_id` = '{$user_id}'"));
    $basket = [];
    if (isset($user_basket)) {
        $products = json_decode($user_basket['products'], true);
        $i = 0;
        foreach ($products as $key => $value) {
            array_push($basket, mysqli_fetch_assoc(mysqli_query($connect, "SELECT `id`, `title`, `description`, `price`, `img` FROM `catalog` WHERE `id` = '{$key}'")));
            $basket[$i]['quantity'] = $value;
            $i++;
        }
    }
    return $basket;
}


function addToCart() {
    $connect = getDb();
    $user_id = get_user_id();
    $user_basket = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `id`, `products`, `user_id` FROM `basket` WHERE `user_id` = '{$user_id}'"));
    $product = (int)$_GET['id'];

    if (isset($user_basket)) {
        $products = json_decode($user_basket['products'], true);
        array_key_exists($product, $products) ? $products[$product] += 1 : $products[$product] = 1;
        $products = json_encode($products);
        mysqli_query($connect, "UPDATE `basket` SET `products` = '$products' WHERE `user_id` = '$user_id'") or die();
        } else {    
            $products[$product] = 1;
            $products = json_encode($products);
            mysqli_query($connect, "INSERT INTO `basket` (`id`, `products`, `user_id`) VALUES (NULL, '$products', '$user_id')") or die();
        }
    header("Location: " . $_GET['page']);
}

function deleteFromCart() {
    $connect = getDb();
    $user_id = get_user_id();
    $user_basket = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `id`, `products`, `user_id` FROM `basket` WHERE `user_id` = '{$user_id}'"));
    $product = (int)$_GET['id'];

        $products = json_decode($user_basket['products'], true);
        if ($products[$product] > 1) {
            $products[$product]--;
            $products = json_encode($products);
        } else {
            unset($products[$product]);
            $products = json_encode($products);
        }
        mysqli_query($connect, "UPDATE `basket` SET `products` = '$products' WHERE `user_id` = '$user_id'") or die();
        header('Location: cart.php');
}

function cleanCart() {
    $connect = getDb();
    $user_id = get_user_id();

    mysqli_query($connect, "DELETE FROM `basket` WHERE `user_id` = '$user_id'") or die();
}

function countTotal($cart, $type) {
    $total = 0;
    if ($type == 'money') {
        foreach ($cart as $key) {
            $total += $key['price'] * $key['quantity'];
        }
    } else if ($type == 'quantity') {
        foreach ($cart as $key) {
            $total += $key['quantity'];
    }
    }
    return $total;
}



function getProduct() {
    $connect = getDb();
    $product_id = (int)$_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `catalog` WHERE `id`={$product_id}");
    $product = mysqli_fetch_assoc($product);
    return $product;
}

// REVIEWS

function getReviews() {
    $connect = getDb();
    $product_id = (int)$_GET['id'];
    $reviews = mysqli_query($connect, "SELECT * FROM `reviews` WHERE `product_id`={$product_id}");

    if ($_GET['action'] == 'addReview') {
        $name = (string)htmlspecialchars(strip_tags($_POST['name']));
        $review = (string)htmlspecialchars(strip_tags($_POST['review']));
        mysqli_query($connect, "INSERT INTO `reviews` (`id`, `name`, `review`, `product_id`) VALUES (NULL, '$name', '$review', '$product_id')");
        header('Location: product.php?id=' . $product_id);
    }
    return $reviews;
}

// ORDERS

function getAllOrders() {
    $orders = getResult('orders');
    return $orders;
}

function changeOrderStatus($order_id, $order_status) {
    $connect = getDb();
    mysqli_query($connect, "UPDATE `orders` SET `status` = '$order_status' WHERE `id` = '$order_id'") or die('Ошибка!');
    header('Location: admin.php');
}

function getOrdersByID() {
    $connect = getDb();
    $user_id = get_user_id();
    $user_orders = mysqli_query($connect, "SELECT `id`, `user`, `order_list`, `phone_number`, `status` FROM `orders` WHERE `user` = '{$user_id}'");
    return $user_orders;
}

function checkOut($cart, $phone) {
    $connect = getDb();
    $phone = (int)$phone;
    $user_id = get_user_id();

    $cart = json_encode($cart);

    if (mysqli_query($connect, "INSERT INTO `orders`(`id`, `user`, `order_list`, `phone_number`) VALUES (NULL, '$user_id', '$cart', '$phone')")) {
        cleanCart();
        header('Location: cart.php/?action=show_success');
    }
}