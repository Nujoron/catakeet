<?php 

class Unit {

    // db stuff
    private $conn ; 
    private $table = 'units';

    // unit properties  

    public $id;
    public $unitName;
    public $userId;
    public $userName;
   

    // constructor with db
    public function __construct($db)
    {
        $this->conn = $db;
    }


    //read all units 
    public function read() {

        //make aquery 
        $query = 'select * from '.$this->table.'';

        //prepare statement 
        $stmt= $this->conn->prepare($query);
        // execute query 

        $stmt->execute();

        return $stmt ; 

    }


// read units  from specific user 
public function userUnits (){

  // create query 
  $query = 'SELECT * FROM  '.$this->table. ' WHERE user_id = :userId '  ;
  // prepare statement 
$stmt = $this->conn->prepare($query);

//bind id 
$stmt->bindParam(':userId', $this->userId);

//execute query 

$stmt->execute();

return $stmt ; 


}

// create item 
public function create(){

    //make query 
    $query = 'INSERT INTO '.$this->table.' SET   
    unit_name = :unit_name, 
    user_id = :user_id ';

    //prepare statement 

    $stmt= $this->conn->prepare($query);

    //bind parameters 
    $stmt->bindParam(':unit_name',$this->unitName);
    $stmt->bindParam(':user_id',$this->userId);

     //execute query 

     if ($stmt->execute()) {
        return true ;
    }

    // print error if something goes wrong 
    printf("Error: %s. \n" ,$stmt->error);
    return false; 

}

// update function 

public function update(){
     //the unit id valueu will be passed by the api on the instance 
      //create query 
      $query =' UPDATE '.$this->table. ' SET unit_name = :unit_name, 
      user_id = :user_id 
     WHERE unit_id = :unit_id ';
      //prepare statement
      $stmt = $this->conn->prepare($query);

      

      //bind values
      $stmt->bindParam(':unit_name', $this->unitName);
      $stmt->bindParam(':user_id', $this->userId);
      $stmt->bindParam(':unit_id', $this->id);
      

     
      

      //execute query 

      if ($stmt->execute()) {
          return true ;
      }

      // print error if something goes wrong 
      printf("Error: %s. \n" ,$stmt->error);
      return false; 



}

// delete unit 
public function delete(){
    //delete query 
     $query= 'DELETE FROM '.$this->table. ' WHERE unit_id = :unit_id ';

     //prepare statement
     $stmt = $this->conn->prepare($query);

     //clean id 
      // $this->id= htmlspecialchars(strip_tags($this->id)); 

     //bind param 
     $stmt->bindParam(':unit_id',$this->id);

     //execute query 

     if ($stmt->execute()) {
         return true ;
     }

     // print error if something goes wrong 
     printf("Error: %s. \n" ,$stmt->error);
     return false; 


 }


}