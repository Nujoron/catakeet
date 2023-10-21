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


$data= json_decode(file_get_contents("php://input"));
$cycle->phId = $data->ph_id;
// to get the result of read query 
$result = $cycle->phCycles();

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
                'count' => $num,
            
            );


            // push to data 
            array_push($cycle_arr['data'],$cycleItem);


        }

        // after all data pushed by loop turn to json ans output 
         echo json_encode($cycleItem);



} else {


    // no units found 
    echo json_encode(array ('count'=> "0"));
}