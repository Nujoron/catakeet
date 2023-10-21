<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
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
    <img class="logo" src="../img/logo.png" alt="" > </div>
<h1 >Admin dashboard</h1>
<h5>user registration </h5>
</header>

<main>

<div class="container">
<form class ="form" id="add_form" >
  <div class="form-group">
    <label for="name">User Name:</label>
    <input type="text" id="name" placeholder="Your user name" class="form-control">
       
   
  </div>
  <div class="form-group">
    <label for="password">Password:</label> 
    <input type="password" id="password" placeholder="password" class="form-control">

  </div>

  <div class="form-group">
    <label for="ph">poultry house:</label> 
    <input type="text" id="ph" placeholder="poultry house" class="form-control">

  </div>

  <button onclick="addUser()">register </button>
</form>


<!-- contINER  -->
</div>

</main>
<script src="../javascript/add_user.js"> </script>
<footer class="footer">
copy rights nouran saleh -nujoron hanso-  2022
</footer>
</body>
</html> 
