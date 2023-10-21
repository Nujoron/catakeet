<?php 

class CycleDay {

    // db stuff
    private $conn ; 
    private $table = 'cycle_days';

    // unit properties  

    public $cycleDay;
    public $dayId;
    public $cycleId;
    public $createdAt;
    public $phId;

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



    //to get the lastday in the cycle 
    public function lastDay (){

         //make query 
    $query= 'SELECT * FROM '.$this->table. ' WHERE cycle_id=:cycle_id ORDER BY cycle_day DESC LIMIT 1';

    //prepare statement
    $stmt= $this->conn->prepare($query);

    
     //bind values
      $stmt->bindParam(':cycle_id', $this->cycleId); 
      

    //execute 
    $stmt->execute();

    //the result should 1 row cause use limit 1 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // to ckeck if row contain any rows 
    if($row){
    //set properties 
    $this->cycleDay = $row['cycle_day'];
    $this->cycleId = $row['cycle_id'];
    $this->dayId = $row['day_id'];

    return true ; 
    }

    else 
    return false; 

 }


 // create item 
public function create(){

    //make query 
    $query = 'INSERT INTO '.$this->table.' SET   
    day_id = :day_id, cycle_id = :cycle_id ';

    //prepare statement 

    $stmt= $this->conn->prepare($query);

    //bind parameters 
   
    $stmt->bindParam(':day_id',$this->dayId);
    $stmt->bindParam(':cycle_id',$this->cycleId);

     //execute query 

     if ($stmt->execute()) {
        return true ;
    }

    // print error if something goes wrong 
    printf("Error: %s. \n" ,$stmt->error);
    return false; 

}
    }

