<?php 

class NutrientConsumed {

    // db stuff
    private $conn ; 
    private $table = 'nutrient_consumed';

    // unit properties  

    public $nutrientId;
    public $cycleDay;
    public $amount;

   

    // constructor with db
    public function __construct($db)
    {
        $this->conn = $db;
    }

//create category
public function create(){

   

    //create query 
    $query ='INSERT INTO '.$this->table. ' SET cycle_day=:cycle_day, nutrient_id = :nutrient_id, 
    amount =:amount';

    //prepare statement
    $stmt = $this->conn->prepare($query);

    //clean data
    // $this->userName= htmlspecialchars(strip_tags($this->userName)); 
    // $this->password= htmlspecialchars(strip_tags($this->password)); 
    // $this->isAdmin= htmlspecialchars(strip_tags($this->isAdmin)); 


    //bind values
    $stmt->bindParam(':cycle_day', $this->cycleDay);
    $stmt->bindParam(':nutrient_id', $this->nutrientId);
    $stmt->bindParam(':amount', $this->amount);
    

    //execute query 

    if ($stmt->execute()) {
        return true ;
    }

    // print error if something goes wrong 
    printf("Error: %s. \n" ,$stmt->error);
    return false; 

}



}