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
include_once '../../models/user.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate user odj 
$user = new User($db); // nujo constractor will recept db obj 



//get raw posted data 
$data= json_decode(file_get_contents("php://input"));
$user->userName = $data->user_name;
$user->password = $data->password;


// user query 
$result = $user->login();

//get row count 
$num = $result->rowCount();



// user login  
if($num>0) {
    include_once'../../controllers/loginController.php';
} else {
    echo json_encode(
        array('message'=>'username or password incorrect')
    );
}
