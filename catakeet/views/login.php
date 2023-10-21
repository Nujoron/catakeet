
<?php include_once'layout/header.php';?>

<div class="container">

<form class ="form" id="login_form" >
  <div class="form-group">
    <label for="name">User Name:</label>
    <input type="text" id="name" placeholder="Your user name" class="form-control">
       
   
  </div>
  <div class="form-group">
    <label for="password">Password:</label> 
    <input type="password" id="password" placeholder="password" class="form-control">

  </div>
  <!-- <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div> -->
   <!-- Button to send data -->
   <button onclick="login1()">log in </button>

   <!-- <button  id="new_nutrient" class="btn btn-secondry" onclick="myFun()" >go</button> -->
</form>



<!-- Include the JavaScript file -->
<script src="javascript/script.js"></script>
</div>

<?php include_once'layout/footer.php';?>