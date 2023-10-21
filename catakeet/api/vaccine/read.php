<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');


include_once '../../config/Database.php';
include_once '../../models/vaccine.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate vaccine odj 
$vaccine = new Vaccine($db); // nujo constractor will recept db obj 

// user query 
$result = $vaccine->read();

//get row count 
$num = $result->rowCount();


//check if any vaccine
if($num>0){

    //user array 
    $vaccine_arr = array();
    $vaccine_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
     extract($row);
     $vaccine_item = array(
        'vaccine_id'=>$vaccine_id,
        'vaccine_name'=>$vaccine_name,
        'vaccine_dose'=>$vaccine_dose,
        'user_id'=>$user_id,
        'user_name'=>$user_name

     );

     // push to data 
     array_push($vaccine_arr['data'],$vaccine_item);

    }

    // turn to json ans output 
    echo json_encode($vaccine_arr);

} else 
        {
            //no users 
            echo json_encode(
                array('massage'=>'no vaccines found ')
            );

                }

