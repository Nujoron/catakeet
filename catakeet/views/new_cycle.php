<?php 
//  header("Location: http://localhost/catakeet/controllers/cycleController.php");
//  exit();
include'layout/header.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<?php session_start(); echo $_SESSION['cycle_id'];?>
<div class="container">
        <form action="#" method="POST">
       <h4> select the species and write the count :  </h4>

       <div class="row">
       <div class="col-sm-2">    
        <div class="select-box" >
          <div class="options-container"  >
            <select class="option btn btn-primary dropdown-toggle" id="one">
              <!-- <option value=""><a href="new_nutrient.php"> add another</a> </option> -->
              
            </select>
          </div>
</div>
</div>

<div class="col-sm-4">
<div>
<input type="text" name="count" id = "count" class="form-control">

</div>
      <div class="row">
        <div  class="col-sm-7"></div>
        
       <button class="btn btn-primary" onclick="save()" > add another </button>
       </div>
      </div><!-- fof the col  -->
     

      <div class="row">
        <div  class="col-sm-9"></div>
        <div class="col-sm-2" >
        <button  id="new_day" class="btn btn-secondry" >day data </button>
      </div><!-- fof the col  -->
      </div><!-- fof the row  -->
      </form>


</div>
 </div>
</body>
</html>

<script src="javascript/cycle.js"></script>
 <?php include'layout/footer.php'?>