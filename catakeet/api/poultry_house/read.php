<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');


include_once '../../config/Database.php';
include_once '../../models/poultry_house.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate vaccine odj 
$poultryHouse = new PoultryHouse($db); // nujo constractor will recept db obj 

// user query 
$result = $poultryHouse->read();

//get row count 
$num = $result->rowCount();


//check if any vaccine
if($num>0){

    //user array 
    $ph_arr = array();
    $ph_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
     extract($row);
     $ph_item = array(
        'ph_id'=>$ph_id,
        'user_name'=>$user_name,
        'user_id'=>$user_id

     );

     // push to data 
     array_push($ph_arr['data'],$ph_item);

    }

    // turn to json ans output 
    echo json_encode($ph_arr);

} else 
        {
            //no users 
            echo json_encode(
                array('massage'=>'no poultry houses found ')
            );

                }

