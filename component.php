<?php

function is_session_started()
{
    if (php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

function getRepString($rep)
{
    $rep = intval($rep);
    if ($rep < 1000) {
        return (string)$rep;
    }
    if ($rep < 10000) {
        return number_format($rep);
    }
    return number_format(($rep / 1000), ($rep % 1000 != 0)) . 'k';
}

function menu_card($productname, $productprice, $productimg, $productid)
{
    echo "
            <div class=\"menu-card\">
                <div class=\"menu-card-img\">
                    <img src=\"./assets/images/FoodMenu/$productimg\" alt=\"\">
                </div>
                <a href=\"includes/addcart.php?id=$productid\"><button name=\"addcart\" class=\"menu-card-btn\"><i class=\"fas fa-shopping-cart\"></i></button></a>
                <div class=\"menu-card-body\">
                    <div class=\"food-detail\">
                        <h4>$productname</h4>
                        <p>Fresh & sweet</p>
                    </div>
                    <div class=\"food-price\">
                        <p>&#8377; $productprice</p>
                    </div>
                </div>
            </div>
        </form>
    ";
}

function new_cart_card($product_id, $product_name, $product_img, $product_price, $product_qnty)
{
    echo "
            <li class=\"items\">

                <div class=\"infoWrap\">
                    <div class=\"cartSection\">

                        <div class=\"itemImg\">
                            <img src=\"./assets/images/FoodMenu/$product_img\" alt=\"\" />
                        </div>
                        <p class=\"itemNumber\">#FOOD-007-" . sprintf("%03d", $product_id) . "</p>
                        <h3>$product_name</h3>

                        <p class=\"itemPrice\">x &#8377; $product_price</p>
                    </div>
                    <div class=\"cartSection itemQnty\">
                        <input type=\"text\" class=\"qty\" value=\"$product_qnty\" />
                    </div>
                    <div class=\"cartSection prodTotal\">
                        <p>&#8377; " . $product_price * $product_qnty . "</p>
                    </div>
                    <div class=\"cartSection delete removeWrap\">
                        <a href=\"includes/removeItem.php?id=$product_id\" class=\"remove-btn\"><i class=\"fas fa-trash\"></i></a>
                    </div>
                </div>
            </li>
    ";
}

function order_card($product_id, $product_name, $product_img, $product_price, $product_qnty)
{
    echo "
            <li class=\"order-item\">
                <div class=\"item-wrap\">
                    <div class=\"item-info\">
                        <div class=\"item-img\">
                            <img src=\"./assets/images/FoodMenu/$product_img\" alt=\"\">
                        </div>
                        <div class=\"item-info-text\">
                            <p class=\"item-number\">#FOOD-007-" . sprintf("%03d", $product_id) . "</p>
                            <h3 class=\"item-name\">$product_name</h3>
                            <p class=\"item-qnty-price\">$product_qnty x &#8377; $product_price</p>
                        </div>
                    </div>
                    <div class=\"item-subprice\">
                        <p>&#8377; " . $product_price * $product_qnty . "</p>
                    </div>
                </div>
            </li>
    ";
}

function order_list_item($order_id, $order_date, $order_name, $order_status, $status_class_name, $order_amount)
{
    echo "
            <li class=\"order-item\">
                <div class=\"order-id\">#$order_id</div>
                <div class=\"order-date\">" . date("F j, Y, g:i a", strtotime($order_date)) . "</div>
                <div class=\"order-name\">$order_name</div>
                <div class=\"order-status $status_class_name\">$order_status</div>
                <div class=\"order-amount\">&#8377; $order_amount</div>
            </li>
    ";
}

function query_card($query_id, $query_name, $query_email, $query_date, $query_msg)
{
    echo "
            <li class=\"query\">
                <div class=\"query-id\">Query #$query_id</div>
                    <div class=\"query-detail\">
                        <div class=\"query-name\">Name : $query_name</div>
                        <div class=\"query-email\">Email : $query_email</div>
                        <div class=\"query-date\">Date : " . date("F j, Y, g:i a", strtotime($query_date)) . "</div>
                    </div>
                    <div class=\"query-msg\">$query_msg</div>
                </li>
    
    ";
}

function admin_order_card($order_id, $order_date, $order_name, $order_amount, $order_status)
{
    echo "
    <form action=\"updateStatus.php?orderId=$order_id\" method=\"POST\">
            <div class=\"order\">
                <li class=\"order-item\">
                    <div class=\"order-id\">#$order_id</div>
                    <div class=\"order-date\">" . date("F j, Y, g:i a", strtotime($order_date)) . "</div>
                    <div class=\"order-name\">$order_name</div>
                    <div class=\"order-stat\">
                        <select class=\"order-status $order_status\" name=\"status\">
                            <option value=\"placed\" class=\"order-status placed\"" . ($order_status == 'placed' ? 'selected' : '') . ">Placed</option>
                            <option value=\"on-the-way\" class=\"order-status on-the-way\"" . ($order_status == 'on-the-way' ? 'selected' : '') . ">On the Way</option>
                            <option value=\"delivered\" class=\"order-status delivered\"" . ($order_status == 'delivered' ? 'selected' : '') . ">Delivered</option>
                            <option value=\"cancelled\" class=\"order-status cancelled\"" . ($order_status == 'cancelled' ? 'selected' : '') . ">Cancelled</option>
                        </select>
                    </div>
                    <div class=\"order-amount\">&#8377; $order_amount</div>
                </li>
                <div class=\"button update-status\">
                <input type=\"submit\" id=\"update-status\" value=\"Update\"></input>
                </div>
                
            </div>
            </form>
    
    ";
}

function my_order_card($order_id, $order_status, $order_date, $order_status_class, $order_status_icon)
{

    echo "
            <li class=\"order-item $order_status_class\">
                <div class=\"order-left\">
                    <div class=\"order-status-icon\"><i class=\"$order_status_icon\"></i></div>
                    <div class=\"order-text\">
                        <div class=\"order-id\">#$order_id</div>
                        <div class=\"order-date\">Date : " . date("F j, Y, g:i a", strtotime($order_date)) . "</div>
                        <div class=\"order_status\">Status : $order_status</div>
                    </div>
                </div>
                <div class=\"order-right\">
                ";
    //             <a href=\"\"><button class=\"order-btn view-detail\">View Details</button></a>
    // ";
    echo $order_status_class == 'placed' || $order_status_class == 'on-the-way' ? '<a href="includes/cancelOrder.php?id=' . $order_id . '"><button class="order-btn cancel">Cancel</button></a>' : '';
    echo "
                </div>
            </li>
    ";
}

function users_list_item($uid, $user_name, $user_email, $user_date, $total_order)
{
    echo "
            <li class=\"order-item\">
                <div class=\"uid\">#$uid</div>
                <div class=\"user-name\">$user_name</div>
                <div class=\"user-email\">$user_email</div>
                <div class=\"user-date\">" . date("F j, Y, g:i a", strtotime($user_date)) . "</div>
                <div class=\"total-user-order\">$total_order</div>
            </li>
    ";
}




// function cart_card($product_id, $product_name, $product_img, $product_price, $product_qnty)
// {
//     echo "
//             <li class=\"items even\">
//                 <div class=\"infoWrap\">
//                 <div class=\"cartSection\">
//                     <div class=\"itemImg\">
//                     <img src=\"./assets/images/FoodMenu/$product_img\" alt=\"\" />
//                     </div>
//                     <p class=\"itemNumber\">#FOOD-007-$product_id</p>
//                     <h3>$product_name</h3>
//                     <p> <input type=\"text\" class=\"qty\" value=\"$product_qnty\" /> x $5.00</p>
//                 </div>
//                 <div class=\"prodTotal cartSection\"><p>&#8377; " . $product_price * $product_qnty . "</p></div>
//                 <div class=\"cartSection removeWrap\">
//                     <a href=\"includes/removeItem.php?id=$product_id\" class=\"remove\"><i class=\"fas fa-trash\"></i></a>
//                 </div>
//                 </div>
//             </li>
//     ";
// }
