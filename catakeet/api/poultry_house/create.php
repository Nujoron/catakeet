<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type, 
Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once '../../config/Database.php';
include_once '../../models/poultry_house.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate vaccine odj 
$poultryHouse = new PoultryHouse($db); // nujo constractor will recept db obj 

//get raw posted data 
$data= json_decode(file_get_contents("php://input"));
$poultryHouse->phId = $data->ph_id;
$poultryHouse->userId = $data->user_id;


//create user 
if($poultryHouse->create()) {
    echo json_encode(
        array('message'=>'poultryHouse created')
    );
} else {
    echo json_encode(
        array('message'=>'poultryHouse not created')
    );
}
