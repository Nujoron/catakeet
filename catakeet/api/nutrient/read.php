<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');


include_once '../../config/Database.php';
include_once '../../models/nutrient.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();


// instance of unit model  class 
$nutrient = new Nutrient($db);


// to get the result of read query 
$result = $nutrient->read();

//get the row count of result 
$num = $result->rowCount();

// check if there is no any unit 
if($num>0 ){
    // nujo used to make json stracture 
        $nutrient_arr = array();
        $nutrient_arr['data'] = array();

        while ($row= $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $nutrientItem = array(
                'nutrient_id' => $nutrient_id,
                'nutrient_name'=>$nutrient_name,
                'nutrient_cat_id'=>$nutrient_cat_id,
                'unit_id'=>$unit_id,
                'unit_name'=>$unit_name
            );


            // push to data 
            array_push($nutrient_arr['data'],$nutrientItem);


        }

        // after all data pushed by loop turn to json ans output 
         echo json_encode($nutrient_arr);



} else {

    // no units found 
    echo json_encode(array ('message'=> "no units found "));
}