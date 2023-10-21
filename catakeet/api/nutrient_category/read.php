<?php 
// nujo comment 
// A response that tells the browser to allow requesting code from the origin https://developer.mozilla.org to access a resource will include the following:

// Access-Control-Allow-Origin: https://developer.mozilla.org

header('Access-Control-Allow-Origin:*');
header('Content-Type: Application/json');


include_once '../../config/Database.php';
include_once '../../models/nutrient_category.php';

// instantiate db & connect 

$database = new Database();
$db = $database->connect();

//instantiate nutrientCategory odj 
$nutrientCategory = new NutrientCategory($db); // nujo constractor will recept db obj 

// user query 
$result = $nutrientCategory->read();

//get row count 
$num = $result->rowCount();


//check if any nutrientCategory
if($num>0){

    //user array 
    $nutrientCategory_arr = array();
    $nutrientCategory_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
     extract($row);
     $nutrientCategory_item = array(
        'nutrient_cat_id'=>$nutrient_cat_id,
        'nutrient_cat_name'=>$nutrient_cat_name,
        'user_id'=>$user_id,
        'user_name'=>$user_name

     );

     // push to data 
     array_push($nutrientCategory_arr['data'],$nutrientCategory_item);

    }

    // turn to json ans output 
    echo json_encode($nutrientCategory_arr);

} else 
        {
            //no nutrientCategory 
            echo json_encode(
                array('massage'=>'no nutrientCategory found ')
            );

                }

