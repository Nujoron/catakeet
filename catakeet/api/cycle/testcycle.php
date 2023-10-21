<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

// header('Access-Control-Allow-Origin:*');
// header('Content-Type: Application/json');

session_start();
$test_arr = array(
        'user_id'=>$_SESSION['user_id'],
        'user_name'=>$_SESSION['user_name'],
        'cycle_id'=>$_SESSION['cycle_id'],
        'day_id'=>$_SESSION['day_id'],
        'ph_id'=>$_SESSION['ph_id']

);

//make json 
print_r(json_encode($test_arr));