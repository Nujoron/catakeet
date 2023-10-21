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
include_once '../../models/cycle_species.php';


// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate user odj 
$cycleSpecies = new CycleSpecies($db); // nujo constractor will recept db obj 

//open session to get cycle_id 
session_start();
$cycleSpecies->cycleId = $_SESSION['cycle_id'];

echo  $_SESSION['cycle_id'];

//get raw posted data 
$data= json_decode(file_get_contents("php://input"));


$cycleSpecies->speciesId = $data->species_id;
$cycleSpecies->speciesCount = $data->species_count;


//create nutrientCategory 
if($cycleSpecies->create()) {
    echo json_encode(
        array('message'=>'species added to cycle')
    );
} else {
    echo json_encode(
        array('message'=>'species not added to cycle ')
    );
}
  
