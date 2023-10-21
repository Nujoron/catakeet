<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type, 
// Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once '../../config/Database.php';
include_once '../../models/cycle.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate vaccine odj 
$cycle = new Cycle($db); // nujo constractor will recept db obj 

//get raw posted data 
$data= json_decode(file_get_contents("php://input"));
$cycle->phId = $data->ph_id;
// $user->userName = isset($_POST['userName']) ? $_POST['userName'] : die();
// $user->password = isset($_post['password']) ? $_post['password'] : die();
// $user->isAdmin = isset($_post['isAdmin']) ? $_post['isAdmin'] : die();

//create user 
if($cycle->create()) {
    echo json_encode(
        array('message'=>'cycle created')
    );
} else {
    echo json_encode(
        array('message'=>'cycle not created')
    );
}
