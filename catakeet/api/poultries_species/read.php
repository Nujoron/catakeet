<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');


include_once '../../config/Database.php';
include_once '../../models/poultries_species.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();


// instance of species model  class 
$poultriesSpecies = new PoultriesSpecies($db);


// to get the result of read query 
$result = $poultriesSpecies->read();

//get the row count of result 
$num = $result->rowCount();

// check if there is no any unit 
if($num>0 ){
    // nujo used to make json stracture 
        $species_arr = array();
        $species_arr['data'] = array();

        while ($row= $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $speciesItem = array(
                'species_id'=>$species_id,
                'species_name' => $species_name
                
            );


            // push to data 
            array_push($species_arr['data'],$speciesItem);


        }

        // after all data pushed by loop turn to json ans output 
         echo json_encode($species_arr);



} else {

    // no units found 
    echo json_encode(array ('message'=> "no cycles found "));
}