<?php 
	
	include 'include/header.php';
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
 
	{

	

 	 
  $sql="SELECT * from  signup WHERE id='".$_SESSION['user_id']."'";
  
   $result=mysqli_query($conn,$sql);
    
     if (mysqli_num_rows($result)>0)
     { 
     	while($row=mysqli_fetch_assoc($result))
     	{
              $name=$row['name'];
            $gender=$row['gender'];
              $city =$row['city'];
              $email =$row['email']; 
              $phone =$row['phone'];
              $comment =$row['comment'];
              $blood_group =$row['bloodgroup'];
              $add =$row['address'];
              $age =$row['age'];
               $pass=$row['password'];
                 }

             }
             $nameErr = $emailErr = $genderErr = $phoneErr = $blood_groupErr= $addErr=$cityErr=$ageErr=$passErr="";
             function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}
 
if (isset($_POST['submit'])) {
/*	$agenew=$_POST['age'];
	$namenew=$_POST['name'];
            $gendernew=$_POST['gender'];
              $citynew =$_POST['city'];
              $emailnew =$_POST['email']; 
              $phonenew =$_POST['phone'];
              $commentnew =$_POST['comment'];
              $blood_groupnew =$_POST['blood_group'];
              $addnew =$_POST['add'];
              $nameErr = $emailErr = $genderErr = $phoneErr = $blood_groupErr= $addErr=$cityErr=$ageErr="";*/
 

if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name= test_input($_POST["name"]);
   
   /* if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";*/
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }



if (empty($_POST["phone"])) {
    $phoneErr = "Contact number is required";
  } else {
    $phone = test_input($_POST["phone"]);
    if(!preg_match('/^[0-9]{10}$/', $_POST["phone"]))
      $phoneErr = "Invalid contact number";
    }
  

if (empty($_POST["blood_group"])) {
    $blood_groupErr = "Bloodgroup is required";
  } else {
    $blood_group = test_input($_POST["blood_group"]);
  }

if (empty($_POST["add"])) {
    $addErr = "address is required";
  } else {
    $add= test_input($_POST["add"]);
  }

if (empty($_POST["city"])) {
    $cityErr = "city is required";
  } else {
    $city= test_input($_POST["city"]);
  }

 

if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } else {
    $age = test_input($_POST["age"]);
    if($age<18)
      { $ageErr="You must be atleast 18 years old to become a donor.";}
  }




              
 if((isset ($name))&& (isset ($email))&& (isset ($age))&& (isset ($add))&& (isset ($phone))&& (isset ($city))&& (isset ($gender))&& (isset ($blood_group)))
 {


  $sql="UPDATE signup SET name='$name',email='$email',age='$age',gender='$gender',address='$add',city='$city',phone='$phone',comment='$comment',bloodgroup='$blood_group' WHERE id='".$_SESSION['user_id']."'";

    
     if (mysqli_query($conn,$sql))
     {echo "Data updated successfully.";}
     else{
      echo "Try again !";
     }
 
}


if (isset($_POST['uppass'])) {
 
  if ( !empty($_POST['oldpassword']) && (isset ($_POST['oldpassword'])) && (!empty($_POST['newpassword'])) && (isset ($_POST['newpassword']))) {
 if    ($pass == $_POST['oldpassword'])
 {
    $pass = test_input($_POST['newpassword']);
    $sql="UPDATE signup SET password='$pass' WHERE id='".$_SESSION['user_id']."'";

    
     if (mysqli_query($conn,$sql))
     {echo "Data updated successfully.";}
     else{
      echo "Try again !";
     }
 } 
 else{
 	echo "Password does not match.";
 }

  }
  else
  {
       echo "Enter password.";
  }

	}
if (isset($_POST['delacc'])) {

 if ( !empty($_POST['accountpassword']) && (isset ($_POST['accountpassword'])) ) {
 if    ($pass == $_POST['accountpassword'])
 {
    $pass = test_input($_POST['accountpassword']);
    $sql=" DELETE FROM signup WHERE id='".$_SESSION['user_id']."'";

    
     if (mysqli_query($conn,$sql))
     {echo "Record deleted successfully.";}
     else{
      echo "Try again !";
     }
 } 
 else{
 	echo "Password does not match.";
 }

  }
  else
  {
       echo "Enter password.";
  }


	}

 include 'include/sidebar.php';



?>


<style>
	 
	 .size{
    padding: 4% 0;
  }
   * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
 
}

input[type=submit], button[type=submit] {
  background-color:#e74c3c ;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 18px;
  cursor: pointer;
   margin-top: 6%;
}

 

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  margin-right: 0;
  margin-left: 0;
}
 .error
     {color: #FF0000;
      font-size: 8px;}

  </style>
</style>
			  

					
				 
 <div class="container" style="padding: 3%;background-color: lightgrey; width: 100%!important;margin-right: 0!important; margin-left: 0 !important;">
          
  <div class="shadow-lg rounded" style="width: 70%; margin: auto; background-color: white; padding: 4%; margin-bottom: 2%;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 

<div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
      <label for="name">Full Name</label>
    </div>
    <div class="col-sm-7 px-0">
     <input type="text" name="name" value="<?php echo $name;?>">
    </div>
     <div class="col-sm-2" style="display: flex;
    align-items: center;" >
        <span class="error">* <?php echo $nameErr;?></span>
  </div> 
</div>





  
    <div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
   <label for="email">E-mail</label>
 </div>
<div class="col-sm-7 px-0">
  <input type="text" name="email" value="<?php echo $email;?>">
</div>
   <div class="col-sm-2" style="display: flex;
    align-items: center;" >
   <span class="error">* <?php echo $emailErr;?></span>
   </div>
 </div>



  
<div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
  <label for="blood_group">Blood Group</label>
</div>
     <div class="col-sm-7 px-0">
                <select name="blood_group" id="blood_group" class=" text-center" value="$blood_group" >
                  
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>

                </select>
                </div>

   <div class="col-sm-2" style="display: flex;
    align-items: center;" >
   <span class="error">* <?php echo $blood_groupErr;?></span>
 </div>
</div>
 
  

 <div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
   <label for="age">Age</label>
 </div>
<div class="col-sm-7 px-0">
  <input type="text" name="age" value="<?php echo $age;?>">
  </div>
   <div class="col-sm-2" style="display: flex;
    align-items: center;" >
     <span class="error">* <?php echo $ageErr;?></span>
   </div>
 </div>

 


   <div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="justify-content:flex-end;display: flex;
    padding-top: 3px;">
   <label for="gender">Gender</label>
 </div>
 <div class="col-sm-7 px-0" style="display: flex;
    align-items: center;justify-content: space-evenly;">
    
     <input type="radio" name="gender" value="female" <?php if ($gender=="female"){ echo "checked";} ?> >Female
  <input type="radio" name="gender" <?php if ($gender=="male"){ echo "checked";} ?>  value="male">Male
  <input type="radio" name="gender" <?php if ($gender=="other"){ echo "checked";} ?>  value="other">Other  
  </div>
   <div class="col-sm-2" style="display: flex;
    align-items: center;" >
   <span class="error">* <?php echo $genderErr;?></span>
   </div>
 </div>





   <div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
   <label for="phone">Contact Number</label>
 </div>
  <div class="col-sm-7 px-0">
     <input type="text" name="phone" value="<?php echo $phone;?>">
    </div>
   <div class="col-sm-2" style="display: flex;
    align-items: center;" >
    <span class="error">* <?php echo $phoneErr;?></span>
   </div>
 </div>







  <div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
   <label for="add">Address</label>
 </div>
<div class="col-sm-7 px-0">
  <input type="text" name="add" value="<?php echo $add;?>">
  </div>
   <div class="col-sm-2" style="display: flex;
    align-items: center;" >
    <span class="error">* <?php echo $addErr;?></span>
   </div>
 </div>

   


   <div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
   <label for="city ">City</label>
 </div>
 <div class="col-sm-7 px-0">
   <div class="form-group text-center">



              
                <select  name="city" id="city" class="form-control demo-default" required >
               <option value="<?php echo $city;?>"><?php echo $city;?></option>
   <optgroup title="Azad Jammu and Kashmir (Azad Kashmir)" label="&raquo; Azad Jammu and Kashmir (Azad Kashmir)"></optgroup><option value="Bagh" >Bagh</option><option value="Bhimber" >Bhimber</option><option value="Kotli" >Kotli</option><option value="Mirpur" >Mirpur</option><option value="Muzaffarabad" >Muzaffarabad</option><option value="Neelum" >Neelum</option><option value="Poonch" >Poonch</option><option value="Sudhnati" >Sudhnati</option><optgroup title="Balochistan" label="&raquo; Balochistan"></optgroup><option value="Awaran" >Awaran</option><option value="Barkhan" >Barkhan</option><option value="Bolan" >Bolan</option><option value="Chagai" >Chagai</option><option value="Dera Bugti" >Dera Bugti</option><option value="Gwadar" >Gwadar</option><option value="Jafarabad" >Jafarabad</option><option value="Jhal Magsi" >Jhal Magsi</option><option value="Kalat" >Kalat</option><option value="Kech" >Kech</option><option value="Kharan" >Kharan</option><option value="Khuzdar" >Khuzdar</option><option value="Kohlu" >Kohlu</option><option value="Lasbela" >Lasbela</option><option value="Loralai" >Loralai</option><option value="Mastung" >Mastung</option><option value="Musakhel" >Musakhel</option><option value="Naseerabad" >Naseerabad</option><option value="Nushki" >Nushki</option><option value="Panjgur" >Panjgur</option><option value="Pishin" >Pishin</option><option value="Qilla Abdullah" >Qilla Abdullah</option><option value="Qilla Saifullah" >Qilla Saifullah</option><option value="Quetta" >Quetta</option><option value="Sibi" >Sibi</option><option value="Zhob" >Zhob</option><option value="Ziarat" >Ziarat</option><optgroup title="Federally Administered Tribal Areas (FATA" label="&raquo; Federally Administered Tribal Areas (FATA"></optgroup><option value="Bajaur Agency" >Bajaur Agency</option><option value="Khyber Agency" >Khyber Agency</option><option value="Kurram Agency" >Kurram Agency</option><option value="Mohmand Agency" >Mohmand Agency</option><option value="North Waziristan Agency" >North Waziristan Agency</option><option value="Orakzai Agency" >Orakzai Agency</option><option value="South Waziristan Agency" >South Waziristan Agency</option><optgroup title="Islamabad Capital" label="&raquo; Islamabad Capital"></optgroup><option value="Islamabad" >Islamabad</option><optgroup title="North-West Frontier Province (NWFP)" label="&raquo; North-West Frontier Province (NWFP)"></optgroup><option value="Abbottabad" >Abbottabad</option><option value="Bannu" >Bannu</option><option value="Batagram" >Batagram</option><option value="Buner" >Buner</option><option value="Charsadda" >Charsadda</option><option value="Chitral" >Chitral</option><option value="Dera Ismail Khan" >Dera Ismail Khan</option><option value="Dir Lower" >Dir Lower</option><option value="Dir Upper" >Dir Upper</option><option value="Hangu" >Hangu</option><option value="Haripur" >Haripur</option><option value="Karak" >Karak</option><option value="Kohat" >Kohat</option><option value="Kohistan" >Kohistan</option><option value="Lakki Marwat" >Lakki Marwat</option><option value="Malakand" >Malakand</option><option value="Mansehra" >Mansehra</option><option value="Mardan" >Mardan</option><option value="Nowshera" >Nowshera</option><option value="Peshawar" >Peshawar</option><option value="Shangla" >Shangla</option><option value="Swabi" >Swabi</option><option value="Swat" >Swat</option><option value="Tank" >Tank</option><optgroup title="Punjab" label="&raquo; Punjab"></optgroup><option value="Alipur" >Alipur</option><option value="Attock" >Attock</option><option value="Bahawalnagar" >Bahawalnagar</option><option value="Bahawalpur" >Bahawalpur</option><option value="Bhakkar" >Bhakkar</option><option value="Chakwal" >Chakwal</option><option value="Chiniot" >Chiniot</option><option value="Dera Ghazi Khan" >Dera Ghazi Khan</option><option value="Faisalabad" >Faisalabad</option><option value="Gujranwala" >Gujranwala</option><option value="Gujrat" >Gujrat</option><option value="Hafizabad" >Hafizabad</option><option value="Jhang" >Jhang</option><option value="Jhelum" >Jhelum</option><option value="Kasur" >Kasur</option><option value="Khanewal" >Khanewal</option><option value="Khushab" >Khushab</option><option value="Lahore" >Lahore</option><option value="Layyah" >Layyah</option><option value="Lodhran" >Lodhran</option><option value="Mandi Bahauddin" >Mandi Bahauddin</option><option value="Mianwali" >Mianwali</option><option value="Multan" >Multan</option><option value="Muzaffargarh" >Muzaffargarh</option><option value="Nankana Sahib" >Nankana Sahib</option><option value="Narowal" >Narowal</option><option value="Okara" >Okara</option><option value="Pakpattan" >Pakpattan</option><option value="Rahim Yar Khan" >Rahim Yar Khan</option><option value="Rajanpur" >Rajanpur</option><option value="Rawalpindi" >Rawalpindi</option><option value="Sahiwal" >Sahiwal</option><option value="Sargodha" >Sargodha</option><option value="Sheikhupura" >Sheikhupura</option><option value="Shekhupura" >Shekhupura</option><option value="Sialkot" >Sialkot</option><option value="Toba Tek Singh" >Toba Tek Singh</option><option value="Vehari" >Vehari</option><optgroup title="Sindh" label="&raquo; Sindh"></optgroup><option value="Badin" >Badin</option><option value="Dadu" >Dadu</option><option value="Ghotki" >Ghotki</option><option value="Hyderabad" >Hyderabad</option><option value="Jacobabad" >Jacobabad</option><option value="Jamshoro" >Jamshoro</option><option value="Karachi" >Karachi</option><option value="Kashmore" >Kashmore</option><option value="Khairpur" >Khairpur</option><option value="Larkana" >Larkana</option><option value="Matiari" >Matiari</option><option value="Mirpur Khas" >Mirpur Khas</option><option value="Naushahro Feroze" >Naushahro Feroze</option><option value="Nawabshah" >Nawabshah</option><option value="Qambar Shahdadkot" >Qambar Shahdadkot</option><option value="Sanghar" >Sanghar</option><option value="Shikarpur" >Shikarpur</option><option value="Sukkur" >Sukkur</option><option value="Tando Allahyar" >Tando Allahyar</option><option value="Tando Muhammad Khan" >Tando Muhammad Khan</option><option value="Tharparkar" >Tharparkar</option><option value="Thatta" >Thatta</option><option value="Umerkot" >Umerkot</option></select>
              </div>
  </div>
   <div class="col-sm-2" style="display: flex;
    align-items: center;" >
    <span class="error">* <?php echo $cityErr;?></span>
     </div>
 </div>
  
    


   
     
      <div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
   <label for="comment ">Suggestions</label>
 </div>
 <div class="col-sm-7 px-0">
   <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
   </div>

   <div class="col-sm-2" >
 </div>
</div>
 

   <div class="row px-0 " >
    <div class="col-sm-5 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
  <input type="submit" name="submit" value="Submit" class="bt2">  
  </div>

   <div class="col-sm-5" >
 </div>
</div>


 
            
</form>

		</div>				 



				 

					

					<!-- Messages -->	
<div class="shadow-lg rounded" style="width: 70%; margin: auto; background-color: white; padding: 4%; margin-bottom: 2%;">
						<form action="" method="post"  >
 
 <div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
   <label for="oldpassword">Current Password</label>
 </div>
 <div class="col-sm-7 px-0">
   <input type="password" required name="oldpassword" placeholder="Current Password">
							
   </div>

   <div class="col-sm-2" >
   	<span class="error">* <?php echo $passErr;?></span>
 </div>
</div>



<div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
  <label for="newpassword">New Password</label>
 </div>
 <div class="col-sm-7 px-0">
   <input type="password" required name="newpassword" placeholder="New Password">
						
   </div>

   <div class="col-sm-2" >
 </div>
</div>
							
			 <div class="row px-0 " >
    <div class="col-sm-5 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
   						<button class="bt2" type="submit" name="uppass">Update Password</button>
  </div>

   <div class="col-sm-5" >
 </div>
</div>
											  
						</form>
					 </div>

				 




					 <div class="shadow-lg rounded" style="width: 70%; margin: auto; background-color: white; padding: 4%;">
						<form action="" method="post"   >
							
							 
<div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
 <label for="oldpassword">Password</label>
 </div>
 <div class="col-sm-7 px-0">
   <input type="password" required name="accountpassword" placeholder="Current Password" class="form-control">
				
   </div>

   <div class="col-sm-2" >
 </div>
</div>
							
			 <div class="row px-0 " >
    <div class="col-sm-5 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
   						<button class="bt2" type="submit" name="delacc">Delete Account</button>
							 

  </div>

   <div class="col-sm-5" >
 </div>
</div>

								
								
							 
								
						</form>

					</div>
				</div>

		 
<?php

}
else  {
		header("Location:../index.php");
	}
include 'include/footer.php'; 
 ?>