<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org
header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: PUT');
// header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type, 
// Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once '../../config/Database.php';
include_once '../../models/unit.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate unit odj 
$unit = new Unit($db); // nujo constractor will recept db obj 



//get raw posted data 
$data= json_decode(file_get_contents("php://input"));
//set id to update 
$unit->id= $data->unit_id;

$unit->unitName = $data->unit_name;

$unit->userId = $data->user_id;


//update user 
if($unit->update()) {
    echo json_encode(
        array('message'=>'unit updated')
    );
} else {
    echo json_encode(
        array('message'=>'unit not updated')
    );
}
