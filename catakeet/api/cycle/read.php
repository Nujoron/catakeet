<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');


include_once '../../config/Database.php';
include_once '../../models/cycle.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();


// instance of cycle model  class 
$cycle = new Cycle($db);


// to get the result of read query 
$result = $cycle->read();

//get the row count of result 
$num = $result->rowCount();

// check if there is no any unit 
if($num>0 ){
    // nujo used to make json stracture 
        $cycle_arr = array();
        $cycle_arr['data'] = array();

        while ($row= $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $cycleItem = array(
                'cycle_id' => $cycle_id,
                'created_at'=>$created_at,
                'ph_id'=>$ph_id
            );


            // push to data 
            array_push($cycle_arr['data'],$cycleItem);

            
        }

        // after all data pushed by loop turn to json ans output 
         echo json_encode($cycle_arr);



} else {

    // no units found 
    echo json_encode(array ('message'=> "no cycles found "));
}