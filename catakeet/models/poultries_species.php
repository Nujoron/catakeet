<?php 

class PoultriesSpecies {

    // db stuff
    private $conn ; 
    private $table = 'poultries_species';

    // unit properties  

    public $speciesId;
    public $speciesName;

   

    // constructor with db
    public function __construct($db)
    {
        $this->conn = $db;
    }



    
    public function read() {

        // create query 
        $query = 'SELECT * FROM ' . $this->table . '';

        // prepare statement 
        $stmt= $this->conn->prepare($query);

        //execute query 

        $stmt->execute();
        return $stmt ; 

    }
    
    //create species
    public function create(){
        //create query 
        $query ='INSERT INTO '.$this->table. ' SET species_name = :species_name, 
        user_id =:user_id';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean data
        // $this->userName= htmlspecialchars(strip_tags($this->userName)); 
        // $this->password= htmlspecialchars(strip_tags($this->password)); 
        // $this->isAdmin= htmlspecialchars(strip_tags($this->isAdmin)); 


        //bind values
        $stmt->bindParam(':species_name', $this->speciesName);
        $stmt->bindParam(':user_id', $this->userId);
        

        //execute query  

        if ($stmt->execute()) {
            return true ;
        }

        // print error if something goes wrong 
        printf("Error: %s. \n" ,$stmt->error);
        return false; 

    }


    
    public function idByName(){
        //make query 
    $query = 'SELECT species_id FROM 
     '.$this->table.' WHERE species_name = :species_name ';

    //prepare statement 

    $stmt= $this->conn->prepare($query);

    //bind parameters 
   
    $stmt->bindParam(':species_name',$this->speciesName);

    //execute 
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //set properties 
    $this->speciesId = $row['species_id'];
   



    }





}