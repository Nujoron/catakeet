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
include_once '../../models/nutrient.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate user odj 
$nutrient = new Nutrient($db); // nujo constractor will recept db obj 



//get raw posted data 
$data= json_decode(file_get_contents("php://input"));
$nutrient->nutrientId = $data->nutrient_id;



// user query 
$result = $nutrient->getUnit();

//get row count 
$num = $result->rowCount();



// user login  
if($num>0) {

     // nujo used to make json stracture 
     
     $row= $result->fetch(PDO::FETCH_ASSOC);
     extract($row);
     $nutrient_arr = array('unit_id'=>$unit_id,
     'unit_name'=>$unit_name);
     
     // after all data pushed by loop turn to json ans output 
      echo json_encode($nutrient_arr);

   
} else {
    echo json_encode(
        array('message'=>'username or password incorrect')
    );
}
