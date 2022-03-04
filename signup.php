 
 
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="sty.css">
  <style type="text/css">
    .size{
    padding: 4% 0;
  }
    .error
     {color: #FF0000;
      font-size: 8px;}

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

input[type=submit] {
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
  </style>
</head>




<body>

	<div class="container-fluid">
		<div class="row">
   <?php 
    include 'db.php'; 
   session_start();
   include 'nav.php';
   ?>
</div>
</div>

<div class="container-fluid bgc size">
  <div class="row px-0 mx-0">

          <div class="col-md-3 col-sm-3 col-3 ">
          </div>
          <div class="col-md-6 col-sm-6 col-6 " style="color: white;">
      <h1 class="text-center">Sign Up</h1>
      <hr class="white-bar">
                </div>
  <div class="col-md-3 col-sm-3 col-3 ">
          </div>
        </div>
      </div>
 
<?php

 
$nameErr = $emailErr = $genderErr = $phoneErr = $blood_groupErr= $addErr=$cityErr= $passErr=$ageErr="";
$name = $email = $gender = $comment = $phone =  $blood_group=$add=$city= $pass=  $age="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  


  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
   
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
    $city = test_input($_POST["city"]);
  }

if (empty($_POST["pass"])) {
    $passErr = " password  is required";
  } else {
    $pass  = test_input($_POST["pass"]);
  }

if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } else {
    $age = test_input($_POST["age"]);
    if($age<18)
      { $ageErr="You must be atleast 18 years old to become a donor.";}
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}

?>
 

 <div class="container" style="padding: 3%;background-color: lightgrey; width: 100%!important;margin-right: 0!important; margin-left: 0 !important;">
          
  <div class="shadow-lg rounded" style="width: 70%; margin: auto; background-color: white; padding: 4%;">
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
   <label for="pass">Set Password</label>
 </div>
 <div class="col-sm-7 px-0">
  <input type="text" name="pass" value="<?php echo $pass;?>">
  </div>
   <div class="col-sm-2" style="display: flex;
    align-items: center;" >
  <span class="error">* <?php echo $passErr;?></span>
   </div>
 </div>
  
<div class="row px-0 " >
    <div class="col-sm-1 px-0">
  </div> 
    <div class="col-sm-2 px-0" style="text-align: right;">
  <label for="blood_group">Blood Group</label>
</div>
     <div class="col-sm-7 px-0">
                <select name="blood_group" id="blood_group" class=" text-center" >
                  
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
     <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked"; ?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked"; ?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked"; ?> value="other">Other  
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
              
                <select  name="city" id="city" class="form-control demo-default" required>
  <option value="">-- Select --</option><optgroup title="Azad Jammu and Kashmir (Azad Kashmir)" label="&raquo; Azad Jammu and Kashmir (Azad Kashmir)"></optgroup><option value="Bagh" >Bagh</option><option value="Bhimber" >Bhimber</option><option value="Kotli" >Kotli</option><option value="Mirpur" >Mirpur</option><option value="Muzaffarabad" >Muzaffarabad</option><option value="Neelum" >Neelum</option><option value="Poonch" >Poonch</option><option value="Sudhnati" >Sudhnati</option><optgroup title="Balochistan" label="&raquo; Balochistan"></optgroup><option value="Awaran" >Awaran</option><option value="Barkhan" >Barkhan</option><option value="Bolan" >Bolan</option><option value="Chagai" >Chagai</option><option value="Dera Bugti" >Dera Bugti</option><option value="Gwadar" >Gwadar</option><option value="Jafarabad" >Jafarabad</option><option value="Jhal Magsi" >Jhal Magsi</option><option value="Kalat" >Kalat</option><option value="Kech" >Kech</option><option value="Kharan" >Kharan</option><option value="Khuzdar" >Khuzdar</option><option value="Kohlu" >Kohlu</option><option value="Lasbela" >Lasbela</option><option value="Loralai" >Loralai</option><option value="Mastung" >Mastung</option><option value="Musakhel" >Musakhel</option><option value="Naseerabad" >Naseerabad</option><option value="Nushki" >Nushki</option><option value="Panjgur" >Panjgur</option><option value="Pishin" >Pishin</option><option value="Qilla Abdullah" >Qilla Abdullah</option><option value="Qilla Saifullah" >Qilla Saifullah</option><option value="Quetta" >Quetta</option><option value="Sibi" >Sibi</option><option value="Zhob" >Zhob</option><option value="Ziarat" >Ziarat</option><optgroup title="Federally Administered Tribal Areas (FATA" label="&raquo; Federally Administered Tribal Areas (FATA"></optgroup><option value="Bajaur Agency" >Bajaur Agency</option><option value="Khyber Agency" >Khyber Agency</option><option value="Kurram Agency" >Kurram Agency</option><option value="Mohmand Agency" >Mohmand Agency</option><option value="North Waziristan Agency" >North Waziristan Agency</option><option value="Orakzai Agency" >Orakzai Agency</option><option value="South Waziristan Agency" >South Waziristan Agency</option><optgroup title="Islamabad Capital" label="&raquo; Islamabad Capital"></optgroup><option value="Islamabad" >Islamabad</option><optgroup title="North-West Frontier Province (NWFP)" label="&raquo; North-West Frontier Province (NWFP)"></optgroup><option value="Abbottabad" >Abbottabad</option><option value="Bannu" >Bannu</option><option value="Batagram" >Batagram</option><option value="Buner" >Buner</option><option value="Charsadda" >Charsadda</option><option value="Chitral" >Chitral</option><option value="Dera Ismail Khan" >Dera Ismail Khan</option><option value="Dir Lower" >Dir Lower</option><option value="Dir Upper" >Dir Upper</option><option value="Hangu" >Hangu</option><option value="Haripur" >Haripur</option><option value="Karak" >Karak</option><option value="Kohat" >Kohat</option><option value="Kohistan" >Kohistan</option><option value="Lakki Marwat" >Lakki Marwat</option><option value="Malakand" >Malakand</option><option value="Mansehra" >Mansehra</option><option value="Mardan" >Mardan</option><option value="Nowshera" >Nowshera</option><option value="Peshawar" >Peshawar</option><option value="Shangla" >Shangla</option><option value="Swabi" >Swabi</option><option value="Swat" >Swat</option><option value="Tank" >Tank</option><optgroup title="Punjab" label="&raquo; Punjab"></optgroup><option value="Alipur" >Alipur</option><option value="Attock" >Attock</option><option value="Bahawalnagar" >Bahawalnagar</option><option value="Bahawalpur" >Bahawalpur</option><option value="Bhakkar" >Bhakkar</option><option value="Chakwal" >Chakwal</option><option value="Chiniot" >Chiniot</option><option value="Dera Ghazi Khan" >Dera Ghazi Khan</option><option value="Faisalabad" >Faisalabad</option><option value="Gujranwala" >Gujranwala</option><option value="Gujrat" >Gujrat</option><option value="Hafizabad" >Hafizabad</option><option value="Jhang" >Jhang</option><option value="Jhelum" >Jhelum</option><option value="Kasur" >Kasur</option><option value="Khanewal" >Khanewal</option><option value="Khushab" >Khushab</option><option value="Lahore" >Lahore</option><option value="Layyah" >Layyah</option><option value="Lodhran" >Lodhran</option><option value="Mandi Bahauddin" >Mandi Bahauddin</option><option value="Mianwali" >Mianwali</option><option value="Multan" >Multan</option><option value="Muzaffargarh" >Muzaffargarh</option><option value="Nankana Sahib" >Nankana Sahib</option><option value="Narowal" >Narowal</option><option value="Okara" >Okara</option><option value="Pakpattan" >Pakpattan</option><option value="Rahim Yar Khan" >Rahim Yar Khan</option><option value="Rajanpur" >Rajanpur</option><option value="Rawalpindi" >Rawalpindi</option><option value="Sahiwal" >Sahiwal</option><option value="Sargodha" >Sargodha</option><option value="Sheikhupura" >Sheikhupura</option><option value="Shekhupura" >Shekhupura</option><option value="Sialkot" >Sialkot</option><option value="Toba Tek Singh" >Toba Tek Singh</option><option value="Vehari" >Vehari</option><optgroup title="Sindh" label="&raquo; Sindh"></optgroup><option value="Badin" >Badin</option><option value="Dadu" >Dadu</option><option value="Ghotki" >Ghotki</option><option value="Hyderabad" >Hyderabad</option><option value="Jacobabad" >Jacobabad</option><option value="Jamshoro" >Jamshoro</option><option value="Karachi" >Karachi</option><option value="Kashmore" >Kashmore</option><option value="Khairpur" >Khairpur</option><option value="Larkana" >Larkana</option><option value="Matiari" >Matiari</option><option value="Mirpur Khas" >Mirpur Khas</option><option value="Naushahro Feroze" >Naushahro Feroze</option><option value="Nawabshah" >Nawabshah</option><option value="Qambar Shahdadkot" >Qambar Shahdadkot</option><option value="Sanghar" >Sanghar</option><option value="Shikarpur" >Shikarpur</option><option value="Sukkur" >Sukkur</option><option value="Tando Allahyar" >Tando Allahyar</option><option value="Tando Muhammad Khan" >Tando Muhammad Khan</option><option value="Tharparkar" >Tharparkar</option><option value="Thatta" >Thatta</option><option value="Umerkot" >Umerkot</option></select>
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


 
            </div>
</form>
</div>
</div>


 
<?php 
include 'db.php';
if (isset($_POST['submit'])){
if((isset ($name))&& (isset ($email))&& (isset ($age))&& (isset ($pass))&& (isset ($add))&& (isset ($phone))&& (isset ($city))&& (isset ($gender))&& (isset ($blood_group)))
 {
  $sql="INSERT into signup (name , email, password,  age, gender,  address, city,  phone ,comment, bloodgroup,ddate) VALUES('$name','$email','$pass','$age','$gender','$add','$city','$phone','$comment','$blood_group','0')";

    
     if (mysqli_query($conn,$sql))
     {echo "You are a part of our donor family now.";}
     else{
      echo "Try again !";
     }
}
}
$conn->close();

?>

<div>
<?php
  include 'contact.php';

  ?>
</div>
 
</body>

 