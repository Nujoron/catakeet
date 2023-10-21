<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');


include_once '../../config/Database.php';
include_once '../../models/unit.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();


// instance of unit model  class 
$unit = new Unit($db);


// to get the result of read query 
$result = $unit->read();

//get the row count of result 
$num = $result->rowCount();

// check if there is no any unit 
if($num>0 ){
    // nujo used to make json stracture 
        $unit_arr = array();
        $unit_arr['data'] = array();

        while ($row= $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $unitItem = array(
                'unit_id' => $unit_id,
                'unit_name'=>$unit_name,
                'user_id'=>$user_id
            );


            // push to data 
            array_push($unit_arr['data'],$unitItem);


        }

        // after all data pushed by loop turn to json ans output 
         echo json_encode($unit_arr);



} else {

    // no units found 
    echo json_encode(array ('message'=> "no units found "));
}