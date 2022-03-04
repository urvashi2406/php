 
<head>
	<link rel="stylesheet" type="text/css" href="sty.css">
</head>
<style>
	 
	h1{
		color: white;
	}
	.form-group{
		text-align: left;
	}
	h3{
		color: #e74c3c;
		text-align: center;
	}
	 
	 button[type=submit] {
  background-color:#e74c3c ;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 18px;
  cursor: pointer;
   
}

 

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  margin-right: 0;
  margin-left: 0;
}

* {
  box-sizing: border-box;
}

input[type=text] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
 
}
</style>
 





<div class="container-fluid">
		<div class="row">
   <?php 
    include 'db.php'; 
   session_start();
   include 'nav.php';

   if (isset($_POST['SignIn'])){
  
if( (isset ($_POST['email'])) && !empty($_POST['email']))
 {
   
  $email=$_POST['email'];
}
else
{
   $emailError="Please enter email.";
}

 
  if( (isset ($_POST['password'])) && !empty($_POST['password']))
 {
   
  $password=$_POST['password'];
}
else
{
   $passwordError="Please enter password.";
}

if( (isset ($_POST['email'])) && (isset ($_POST['password'])))
 {   $sql="SELECT * from  signup WHERE email='$email' AND password='$password'";
  
    $result=mysqli_query($conn,$sql);
     if (mysqli_num_rows($result)>0)
      { while($row=mysqli_fetch_assoc($result)){
      $_SESSION['user_id']=$row['id'];
      $_SESSION['name']=$row['name'];
      $_SESSION['ddate']=$row['ddate'];  

       header('Location:user/index.php');
       }
}
else
{
  echo 'No Record Found.';
}


}



}

   ?>
</div>
</div>



 <div class="container-fluid bgc size">
  <div class="row px-0 mx-0">

          <div class="col-md-3 col-sm-3 col-3 ">
          </div>
          <div class="col-md-6 col-sm-6 col-6 " style="color: white;">
      <h1 class="text-center">Sign In</h1>
      <hr class="white-bar">
                </div>
  <div class="col-md-3 col-sm-3 col-3 ">
          </div>
        </div>
      </div>


      <div class="container" style="padding: 3%;background-color: lightgrey; width: 100%!important;margin-right: 0!important; margin-left: 0 !important;">
          
  <div class="shadow-lg rounded" style="width: 70%; margin: auto; background-color: white; padding: 4%;">

			<form action="" method="post" >
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email" required>
        <?php  if( isset ($emailError))
              { echo '$emailError';} ?>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="Password" required class="form-control">
          <?php  if( isset ($passwordError))
 {echo '$passwordError';} ?>
				</div>
				<div class="form-group" style=" justify-content: center;
    display: flex;">
					<button class="btn btn-danger btn-lg " type="submit" name="SignIn">Sign In</button>
				</div>
			</form>
		</div>
	</div>
 

<?php include 'contact.php'; ?>
