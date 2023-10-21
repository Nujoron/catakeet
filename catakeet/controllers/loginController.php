<?php 



include_once'../../models/poultry_house.php';
include_once'../../models/cycle.php';
include_once'../../models/cycle_day.php';





 

// check if the user is an admid or not to decide witch the next page and controller 
//is admin is boolen value 1 refer to admin 
if($user->isAdmin == 1 ){

  echo json_encode(
    array('page'=>'dashboard.php'));

  exit();

}
else{

  // create an poultry house instance obj 
$poultryHouse = new PoultryHouse($db) ;

//set the user id in the poultry house from the id that assigned to user object after login 
$poultryHouse->userId = $user->id ;

// call the userpoultryhouse fun to assign the ph_id of this user to phId property in object 
$poultryHouse->userPh();

$cycle = new Cycle($db);
$cycle->phId = $poultryHouse->phId;

$cycleDay = new CycleDay($db);

 
    // the last cycle of this ph and the last day of its cycle 
    // use the last cycle model to get the last cycle of this ph 
   
    // if he has any previous cycle 
    if ( $cycle->lastCycle())
   {

        
          //create cycle day instsnce 
          
          $cycleDay->cycleId = $cycle->cycleId;

          // the last day will get the last day for this cycle 
          $cycleDay->lastday();

                  // if the last cycle last day 45 then new cycle should  opened 
                  if($cycleDay->dayId<45){
                    //if day < 45 cycle still uncomplete -> creation of new cycle day 
                    $cycleDay->dayId = $cycleDay->dayId + 1 ;
                    $cycleDay->create(); 

                    //fetch the last cycle day id to be used in day data insert

                    $cycleDay->lastDay();

                    session_start();
                    $_SESSION['user_id']= $user->id;
                    $_SESSION['user_name']= $user->userName;
                    $_SESSION['ph_id']= $poultryHouse->phId; 
                    $_SESSION['cycle_id']= $cycle->cycleId ;
                    $_SESSION['day_id']= $cycleDay->dayId; 
                    $_SESSION['cycle_day']= $cycleDay->cycleDay; 

                    echo json_encode(
                      array('page'=>'new_day.php'));
                    // * to the page of new day *
                    // the cycle still uncompleted so day page will directed new day page 
                    // header("location: ../../views/new_day.php",  true,  301 ); 
                     exit();
                  
                    
                  }    }
   
        
            // new cycle should created 
                    //create new cycle 
            if($cycle->create())
            {
             
              //featch the id of created cycle 
              $cycle->lastCycle();
              //set the day id propery witch the cycle now created so its firstday 
              $cycleDay->dayId = 1;

              // //set cycle id 
                $cycleDay->cycleId = $cycle->cycleId;
                //cycle day creation need cycle id and day id 
                $cycleDay->create(); 

                //fetch the last cycle_day id to be used in day data insert

                  $cycleDay->lastDay();

                  session_start();
                  $_SESSION['user_id']= $user->id;
                  $_SESSION['user_name']= $user->userName;
                  $_SESSION['ph_id']= $poultryHouse->phId; 
                  $_SESSION['cycle_id']= $cycle->cycleId ;
                  $_SESSION['day_id']= $cycleDay->dayId; 
                  $_SESSION['cycle_day']= $cycleDay->cycleDay;  

                
                  
                  echo json_encode(
                    array('page'=>'new_cycle.php'));
                  // header("location: ../../views/new_cycle.php",  true,  301 ); 
                  exit();
            }

        
   
  

   

        

} 