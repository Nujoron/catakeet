<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');


include_once '../../config/Database.php';
include_once '../../models/user.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate user odj 
$user = new User($db); // nujo constractor will recept db obj 

// user query 
$result = $user->read();

//get row count 
$num = $result->rowCount();


//check if any user 
if($num>0){

    //user array 
    $user_arr = array();
    $user_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
     extract($row);
     $user_item = array(
        'id'=>$user_id,
        'user_name'=>$user_name,
        'password'=>$password,
        'is_admin'=>$is_admin,
        'ph_id'=>$ph_id

     );

     // push to data 
     array_push($user_arr['data'],$user_item);

    }

    // turn to json ans output 
    echo json_encode($user_arr);

} else 
        {
            //no users 
            echo json_encode(
                array('massage'=>'no users found ')
            );

                }

