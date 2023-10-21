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
include_once '../../models/unit.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

// instance of unit model  class 
$unit = new Unit($db);

//get raw posted data 
$data= json_decode(file_get_contents("php://input"));
$unit->unitName = $data->unit_name;
$unit->userId = $data->user_id;



//create  unit
if($unit->create()) {
    echo json_encode(
        array('message'=>'unit created')
    );
} else {
    echo json_encode(
        array('message'=>'unit not created')
    );
}

