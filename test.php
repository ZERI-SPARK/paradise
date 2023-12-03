<?php

require_once 'config.php';
require_once 'component.php';

if (is_session_started() === FALSE) session_start();

$result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `food_orders` FROM `orders` WHERE `order_id`='1995456156'"));

$de_food = json_decode($result['food_orders'], true);

echo "<pre>";
print_r(array_sum(array_column($de_food, 'qnty')));
echo "</pre>";
