<?php
/**
 * Created by PhpStorm.
 * User: Ramachandra
 * Date: 6/5/2016
 * Time: 4:56 PM
 */
if (is_ajax()) {

          test_function();


}
//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function test_function(){
    $return = $_POST;
//Do what you need to do with the info. The following are some examples.
//if ($return["favorite_beverage"] == ""){
// $return["favorite_beverage"] = "Coke";
//}
//$return["favorite_restaurant"] = "McDonald's";
    $return["json"] = json_encode($return);
    echo json_encode($return);
}
?>