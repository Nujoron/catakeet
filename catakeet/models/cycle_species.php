<?php 

class CycleSpecies {

    // db stuff
    private $conn ; 
    private $table = 'cycle_species';

    // unit properties  

    public $cycleId;
    public $speciesId;
    public $speciesCount;


    
    //read all cycles 
    public function read() {

        //make aquery 
        $query = 'SELECT * From  '.$this->table.'';

        //prepare statement 
        $stmt= $this->conn->prepare($query);
        // execute query 

        $stmt->execute();

        return $stmt ; 

    }

    public function create(){

    //make query 
    $query = 'INSERT INTO '.$this->table.' SET    
    cycle_id = :cycle_id, species_id=:species_id, species_count = :species_count ';

    //prepare statement 

    $stmt= $this->conn->prepare($query);

    //bind parameters 
   
    $stmt->bindParam(':cycle_id',$this->cycleId);
    $stmt->bindParam(':species_id',$this->speciesId);
    $stmt->bindParam(':species_count',$this->speciesCount);

     //execute query 

     if ($stmt->execute()) {
        return true ;
    }

    // print error if something goes wrong 
    printf("Error: %s. \n" ,$stmt->error);
    return false; 



    }



}
   