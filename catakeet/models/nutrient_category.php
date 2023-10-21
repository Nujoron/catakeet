<?php 

class NutrientCategory {

    // db stuff
    private $conn ; 
    private $table = 'nutrient_categories';

    //user properties 

    public $nutrientCatId;
    public $nutrientCatName;
    public $userId;
    public $userName ;

    // constructor with db
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // get vaccines 

    public function read() {

        // create query 
        $query = 'SELECT 
        u.user_name,
        n.nutrient_cat_id,
        n.nutrient_cat_name,
        n.user_id
          FROM ' . $this->table . ' n 
         LEFT JOIN 
         users u ON n.user_id = u.user_id
         '  ;

        // prepare statement 
        $stmt= $this->conn->prepare($query);

        //execute query 

        $stmt->execute();
        return $stmt ; 

    }

    
    //create category
    public function create(){
        //create query 
        $query ='INSERT INTO '.$this->table. ' SET nutrient_cat_name = :nutrient_cat_name, 
        user_id =:user_id';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean data
        // $this->userName= htmlspecialchars(strip_tags($this->userName)); 
        // $this->password= htmlspecialchars(strip_tags($this->password)); 
        // $this->isAdmin= htmlspecialchars(strip_tags($this->isAdmin)); 


        //bind values
        $stmt->bindParam(':nutrient_cat_name', $this->nutrientCatName);
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