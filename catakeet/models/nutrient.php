<?php 

class Nutrient {

    // db stuff
    private $conn ; 
    private $table = 'nutrients';

    // unit properties  

    public $nutrientId;
    public $nutrientName;
    public $nutrientCatId;
    public $unitName;
    public $unitId;
   

    // constructor with db
    public function __construct($db)
    {
        $this->conn = $db;
    }


    //read all units 
    public function read() {

        //make aquery 
        $query = ' SELECT 
        u.unit_name,
        n.nutrient_id ,
        n.nutrient_name,
        n.nutrient_cat_id,
        n.unit_id
        FROM '.$this->table.' n
         LEFT JOIN 
         units u ON n.unit_id = u.unit_id';

        //prepare statement 
        $stmt= $this->conn->prepare($query);
        // execute query 

        $stmt->execute();

        return $stmt ; 

    }

    //read all units 
    public function getUnit() {

        //make aquery 
        $query = ' SELECT 
        u.unit_name,
        n.unit_id
        FROM '.$this->table.' n
         LEFT JOIN 
         units u ON n.unit_id = u.unit_id WHERE nutrient_id =:nutrient_id';

        //prepare statement 
        $stmt= $this->conn->prepare($query);
        // execute query 
         //bind values
         $stmt->bindParam(':nutrient_id', $this->nutrientId);
         
        $stmt->execute();

        return $stmt ; 

    }


    
    //create nutrient
    public function create(){
        //create query 
        $query ='INSERT INTO '.$this->table. ' SET nutrient_name = :nutrient_name, 
        nutrient_cat_id = :nutrient_cat_id,
        unit_id=:unit_id,
        user_id =:user_id';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean data
        // $this->userName= htmlspecialchars(strip_tags($this->userName)); 
        // $this->password= htmlspecialchars(strip_tags($this->password)); 
        // $this->isAdmin= htmlspecialchars(strip_tags($this->isAdmin)); 


        //bind values
        $stmt->bindParam(':nutrient_name', $this->nutrientName);
        $stmt->bindParam(':nutrient_cat_id', $this->nutrientCatId);
        $stmt->bindParam(':unit_id', $this->unitId);
        $stmt->bindParam(':user_id', $this->userId);
        

        //execute query 

        if ($stmt->execute()) {
            return true ;
        }

        // print error if something goes wrong 
        printf("Error: %s. \n" ,$stmt->error);
        return false; 

    }


}