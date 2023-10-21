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
include_once '../../models/nutrient_consumed.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate nutrientCategory odj 
$nutrientConsumed = new NutrientConsumed($db); // nujo constractor will recept db obj 

//start session to fetvh data that stored by login controller 

session_start();
    
//set the cycle day from session data 
$nutrientConsumed->cycleDay = $_SESSION['cycle_day'];

//get raw posted data 
$data= json_decode(file_get_contents("php://input"));

$nutrientConsumed->nutrientId = $data->nutrient_id;

$nutrientConsumed->amount = $data->amount;


//create nutrientCategory 
if($nutrientConsumed->create()) {
    echo json_encode(
        array('message'=>'nutrientCategory created')
    );
} else {
    echo json_encode(
        array('message'=>'nutrientCategory not created')
    );
}
