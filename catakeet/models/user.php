<?php 

class User {

    // db stuff
    private $conn ; 
    private $table = 'users';

    //user properties 

    public $id;
    public $userName;
    public $password;
    public $isAdmin ;
    public $phId;

    // constructor with db
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // get users 

    public function read() {

        // create query 
        $query = 'select 
        u.user_name,
        u.user_id,
        u.password,
        u.is_admin,
        p.ph_id 
        from '.$this->table.' u
         LEFT JOIN 
         poultry_houses p ON u.user_id = p.user_id' ;

        // prepare statement 
        $stmt= $this->conn->prepare($query);

        //execute query 

        $stmt->execute();
        return $stmt ; 

    }


    //get single user
    public function readSingle(){
         // create query 
         $query = 'SELECT * FROM '.$this->table. ' WHERE user_id = ? '  ;
          // prepare statement 
        $stmt = $this->conn->prepare($query);

        //bind id 
        $stmt->bindParam(1, $this->id);

        //execute query 

        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // to ckeck if row contain any rows 
        if($row){
        //set properties 
        $this->id = $row['user_id'];
        $this->userName = $row['user_name'];
        $this->password = $row['password'];
        $this->isAdmin = $row['is_admin']; }

    }


    //create user 
    public function create(){
        //create query 
        $query ='INSERT INTO '.$this->table. ' SET user_name = :user_name, 
        password = :password ' ;
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean data
        // $this->userName= htmlspecialchars(strip_tags($this->userName)); 
        // $this->password= htmlspecialchars(strip_tags($this->password)); 
        // $this->isAdmin= htmlspecialchars(strip_tags($this->isAdmin)); 


        //bind values
        $stmt->bindParam(':user_name', $this->userName);
        $stmt->bindParam(':password', $this->password);
        

        //execute query 

        if ($stmt->execute()) {
            return true ;
        }

        // print error if something goes wrong 
        printf("Error: %s. \n" ,$stmt->error);
        return false; 

    }

     //update  user 
     public function update(){
        //create query 
        $query =' UPDATE '.$this->table. ' SET user_name = :user_name, 
        password = :password, 
        is_admin = :is_admin WHERE user_id = :user_id ';
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean data
        // $this->userName= htmlspecialchars(strip_tags($this->userName)); 
        // $this->password= htmlspecialchars(strip_tags($this->password)); 
        // $this->isAdmin= htmlspecialchars(strip_tags($this->isAdmin)); 
        // $this->id= htmlspecialchars(strip_tags($this->id)); 


        //bind values
        $stmt->bindParam(':user_name', $this->userName);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':is_admin', $this->isAdmin);
        $stmt->bindParam(':user_id', $this->id);
        

        //execute query 

        if ($stmt->execute()) {
            return true ;
        }

        // print error if something goes wrong 
        printf("Error: %s. \n" ,$stmt->error);
        return false; 

    }

    // delete user 
    public function delete(){
       //delete query 
        $query= 'DELETE FROM '.$this->table. ' WHERE user_id = :user_id ';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean id 
         // $this->id= htmlspecialchars(strip_tags($this->id)); 

        //bind param 
        $stmt->bindParam(':user_id',$this->id);

        //execute query 

        if ($stmt->execute()) {
            return true ;
        }

        // print error if something goes wrong 
        printf("Error: %s. \n" ,$stmt->error);
        return false; 


    }




    //login user 
    public function login(){
        //create query 
        $query ='SELECT * From '.$this->table.' Where user_name =:user_name And password = :password';
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean data
        // $this->userName= htmlspecialchars(strip_tags($this->userName)); 
        // $this->password= htmlspecialchars(strip_tags($this->password)); 
        // $this->isAdmin= htmlspecialchars(strip_tags($this->isAdmin)); 


        //bind values
        $stmt->bindParam(':user_name', $this->userName);
        $stmt->bindParam(':password', $this->password);
        

        //execute query 
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //set properties  of the user id and is admin to be saved in model prrperties  when the login success 

         // to ckeck if row contain any rows cuz when the login un success row value will false
        if($row){
            //set properties 
            $this->id = $row['user_id'];
            $this->userName = $row['user_name'];
            $this->password = $row['password'];
            $this->isAdmin = $row['is_admin']; }

       return $stmt;


    }

public function nameById(){

  //create query 
  $query ='SELECT * From '.$this->table.' Where user_name =:user_name ';
  //prepare statement
  $stmt = $this->conn->prepare($query);
   //bind values
   $stmt->bindParam(':user_name', $this->userName);
   
        //execute query 
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            //set properties 
            $this->id = $row['user_id'];
            $this->userName = $row['user_name'];
            $this->password = $row['password'];
            $this->isAdmin = $row['is_admin'];
         }

       return $this->id;


}
}