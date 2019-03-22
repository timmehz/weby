<?php
		/****Error Reporting Start****/
		ini_set('display_errors',1); 
		error_reporting(E_ALL);
		/****Error Reporting End****/
?>
<?php
               require_once("inc/redirect.php");
               require_once("inc/validation_functions.php");
               
               $errors = array();
               $username_data = "";
               $password_data = "";
               $email_data = "";
               $message = "";
               
               if(isset($_POST["submit"])){
					// form was submitted
					$username = trim($_POST["username_data"]);
					$password = trim($_POST["password_data"]);
					$email = trim($_POST["email_data"]);
					// validations
					$fields_required = array("username_data", "password_data", "email_data");
					
					foreach($fields_required as $field){
							$value = trim($_POST[$field]);
							if(!is_required($value)){
								$errors["$field"] = ucfirst($field) . " cannot be blank.";
							}
					}
					// using an associative array
					$fields_with_max_lengths = array("username_data" => 20, "password_data" => 20, "email_data" => 20);
					validate_max_lengths($fields_with_max_lengths);
					
					if (empty($errors)){
						// try to login
						if ($username == "{$username_data}" && $password == "{$password_data}" && email == "{$email_data}"){
							// successful login
							redirect_to("index.php");
							} else{
								$message = "Data you have entered is not correct."
							} else{
								$username = "";
								$password = "";
								$email = "";
								$message = "Please login";
							}
					}
			    }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="shortcut icon" href="imgs/Steam_Rewards_Logo.png" />
	  <title>Steam Rewards-Home</title>
	  <link rel = "stylesheet" href = "css/welcome_website.css">
   </head>
   <body>
      <!-- Navigation -->
      <header>
         <!-- Fixed Navigation -->
         <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#" >Steam Rewards</a>
            <!-- Mobile Hamburger Nav -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="earn.php">Earn</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="discord.php">Discord</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="login.php">Login/Signup</a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <section>
         <!-- Begin Page Content -->
         <div class="container-fluid" style="padding-top: 100px;>
            <div class="row">
            <div class="col" align="center">
               <!-- Content Here -->
               
               <?php echo $message; ?><br>
               <?php echo form_errors($errors); ?>
               <form action = "forms-with-validation.php" method="post" >
               Username: <input type="text" name="username" value=<?php echo htmlspecialchards($username)?>; >
               Password: <input type="password" name="password" value="" >
               Email: <input type="email" name="email" value="" ><br><br>
               </form>
            </div>
         </div>
      </section>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <footer class="footerstyle">
         <!-- Footer -->
         <div class="container">
            Copyright 2019 :: All Rights Reserved
         </div>
      </footer>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>
