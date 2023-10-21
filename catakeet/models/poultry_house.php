<?php 

class PoultryHouse {

    // db stuff
    private $conn ; 
    private $table = 'poultry_houses';

    // poultry properties 

    public $phId;
    public $userId;
    public $userName;
  
   

    // constructor with db
    public function __construct($db)
    {
        $this->conn = $db;
    }


    //read all poultries 
    public function read() {

        //make aquery 
        $query = 'select 
        u.user_name,
        p.ph_id ,
        p.user_id
        from '.$this->table.' p
         LEFT JOIN 
         users u ON p.user_id = u.user_id';

        //prepare statement 
        $stmt= $this->conn->prepare($query);
        // execute query 

        $stmt->execute();

        return $stmt ; 

    }

    // get single poultry by its id 

    public function readSingle(){
        // create query 
        $query = 'SELECT * FROM '.$this->table. ' WHERE ph_id = ? '  ;
         // prepare statement 
       $stmt = $this->conn->prepare($query);

       //bind id 
       $stmt->bindParam(1, $this->phId);

       //execute query 

       $stmt->execute();
    
       $row = $stmt->fetch(PDO::FETCH_ASSOC);

       //set properties 
       $this->phId = $row['ph_id'];
       $this->userId = $row['user_id'];
      

   }

   //to return the ph of the user 
   public function userPh (){

     // create query 
     $query = 'SELECT * FROM '.$this->table. ' WHERE user_id = :user_id  '  ;
     // prepare statement 
   $stmt = $this->conn->prepare($query);

   //bind id 
   $stmt->bindParam(':user_id', $this->userId);

   //execute query 

   $stmt->execute();

   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   //set properties 
   $this->phId = $row['ph_id'];
   $this->userId = $row['user_id'];
  

   }

// create item 
public function create(){

    //make query 
    $query = 'INSERT INTO '.$this->table.' SET   
    ph_id = :ph_id, 
    user_id = :user_id ';

    //prepare statement 

    $stmt= $this->conn->prepare($query);

    //bind parameters 
    $stmt->bindParam(':ph_id',$this->phId);
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

// public function update(){
//      //the unit id valueu will be passed by the api on the instance 
//       //create query 
//       $query =' UPDATE '.$this->table. ' SET unit_name = :unit_name, 
//       user_id = :user_id 
//      WHERE unit_id = :unit_id ';
//       //prepare statement
//       $stmt = $this->conn->prepare($query);

      

//       //bind values
//       $stmt->bindParam(':unit_name', $this->unitName);
//       $stmt->bindParam(':user_id', $this->userId);
//       $stmt->bindParam(':unit_id', $this->id);
      

     
      

//       //execute query 

//       if ($stmt->execute()) {
//           return true ;
//       }

//       // print error if something goes wrong 
//       printf("Error: %s. \n" ,$stmt->error);
//       return false; 



// }

// delete unit 
public function delete(){
    //delete query 
     $query= 'DELETE FROM '.$this->table. ' WHERE ph_id = :ph_id ';

     //prepare statement
     $stmt = $this->conn->prepare($query);

     //clean id 
      // $this->id= htmlspecialchars(strip_tags($this->id)); 

     //bind param 
     $stmt->bindParam(':unit_id',$this->ph_id);

     //execute query 

     if ($stmt->execute()) {
         return true ;
     }

     // print error if something goes wrong 
     printf("Error: %s. \n" ,$stmt->error);
     return false; 


 }


}