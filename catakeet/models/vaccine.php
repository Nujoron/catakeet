<?php 

class Vaccine {

    // db stuff
    private $conn ; 
    private $table = 'vaccines';

    //user properties 

    public $vaccineId;
    public $vaccineName;
    public $vaccineDose;
    public $userId ;
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
        v.vaccine_id,
        v.vaccine_name,
        v.vaccine_dose,
        v.user_id
          FROM ' . $this->table . ' v 
         LEFT JOIN 
         users u ON v.user_id = u.user_id
         '  ;

        // prepare statement 
        $stmt= $this->conn->prepare($query);

        //execute query 

        $stmt->execute();
        return $stmt ; 

    }

    
    //create vaccine
    public function create(){
        //create query 
        $query ='INSERT INTO '.$this->table. ' SET vaccine_name = :vaccine_name, 
        vaccine_dose = :vaccine_dose, 
        user_id = :user_id';
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean data
        // $this->userName= htmlspecialchars(strip_tags($this->userName)); 
        // $this->password= htmlspecialchars(strip_tags($this->password)); 
        // $this->isAdmin= htmlspecialchars(strip_tags($this->isAdmin)); 


        //bind values
        $stmt->bindParam(':vaccine_name', $this->vaccineName);
        $stmt->bindParam(':vaccine_dose', $this->vaccineDose);
        $stmt->bindParam(':user_id', $this->user_id);

        //execute query 

        if ($stmt->execute()) {
            return true ;
        }

        // print error if something goes wrong 
        printf("Error: %s. \n" ,$stmt->error);
        return false; 

    }

   


    }