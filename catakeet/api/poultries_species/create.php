<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type, 
Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once '../../config/Database.php';
include_once '../../models/poultries_species.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate poultriesSpecies odj 
$poultriesSpecies = new PoultriesSpecies($db); // nujo constractor will recept db obj 

//get raw posted data 
$data= json_decode(file_get_contents("php://input"));

$poultriesSpecies->speciesName = $data->species_name;
$poultriesSpecies->userId = $data->user_id;


//create poultriesSpecies
if($poultriesSpecies->create()) {
    echo json_encode(
        array('message'=>'poultriesSpecies created')
    );
} else {
    echo json_encode(
        array('message'=>'poultriesSpecies not created')
    );
}
