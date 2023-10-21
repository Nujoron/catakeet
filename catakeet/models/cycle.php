<?php 

class Cycle {

    // db stuff
    private $conn ; 
    private $table = 'cycles';

    // unit properties  

    public $cycleId;
    public $createdAt;
    public $phId;
    public $userName;
   

    // constructor with db
    public function __construct($db)
    {
        $this->conn = $db;
    }


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


// read units  from specific user 
public function phCycles (){

  // create query 
  $query = 'SELECT * FROM  '.$this->table. ' WHERE ph_id = :phId '  ;
  // prepare statement 
$stmt = $this->conn->prepare($query);

//bind id 
$stmt->bindParam(':phId', $this->phId);

//execute query 

$stmt->execute();


return $stmt ; 


}

// create item 
public function create(){

    //make query 
    $query = 'INSERT INTO '.$this->table.' SET   
    ph_id = :ph_id ';

    //prepare statement 

    $stmt= $this->conn->prepare($query);

    //bind parameters 
   
    $stmt->bindParam(':ph_id',$this->phId);

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


 public function lastCycle () {


    //make query 
    $query= 'SELECT * FROM '.$this->table. ' WHERE ph_id =:ph_id ORDER BY cycle_id DESC LIMIT 1';

    //prepare statement
    $stmt= $this->conn->prepare($query);

    
     //bind values
      $stmt->bindParam(':ph_id', $this->phId); 

    //execute 
    $stmt->execute();

    //the result should 1 row cause use limit 1 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // to ckeck if row contain any rows 
    if($row){
    //set properties 
    $this->cycleId = $row['cycle_id'];
    $this->phId = $row['ph_id'];
    $this->createdAt = $row['created_at'];
     return true ;
    }

    else 
    return false; 

 }



}