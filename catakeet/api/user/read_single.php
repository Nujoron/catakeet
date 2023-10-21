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


//get id 
$user->id = isset($_GET['id']) ? $_GET['id'] : die();  // nujo comment ? and : is if else 


//get user 

$user->readSingle();

//create array 
$user_arr = array(
        'user_id'=>$user->id,
        'user_name'=>$user->userName,
        'password'=>$user->password,
        'is_admin'=>$user->isAdmin

);

//make json 
print_r(json_encode($user_arr));