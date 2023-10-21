<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   
    <title>admin-dashboard</title>

</head>
<body>
    

<header class="back">
    <div>
    <img class="logo" src="img/logo.png" alt="" > </div>
<h1 >Admin dashboard</h1>
</header>

<main>

<div class="container">
<form class="form" id="dashboard_form">


<div class="row">
<div class="col-sm-4">
 <label for="add_users"> add user </label>   
</div>
    <div class="col-sm-4">
<button type="submit" id="add_user" class="btn btn-secondry"  onclick="testUrl('admin/add_user.php')"> add user </button>
</div>
</div>


<div class="row">
<div class="col-sm-4">
 <label for="show_users"> show users </label>   
</div>
    <div class="col-sm-4">
<button type="submit" id="show_users" class="btn btn-secondry"  onclick="testUrl('users.php')"> show users </button>
</div>

</div>

<div class="row">

  <div class="col-sm-4">
       <label for="show_cycles" > show cycles </label>
  </div> 
  <div class="col-sm-4">


</div> 
</div>



<div class="row">
<div class="col-sm-4">
  <label for="show_ph" > show poultry houses </label>   
 </div>    
   <div  class="col-sm-5">
<button type="submit" id="show_ph" class="btn btn-secondry" > show poultry houses </button>
</div>

</div>



</form>

</div>
</main>
<script src="javascript/dashboard.js"> </script>
<footer class="footer">
copy rights nouran saleh -nujoron hanso-  2022
</footer>
</body>
</html> 
