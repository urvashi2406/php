
<?php 

	include 'include/header.php'; 
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	
      
      if (isset($_POST['date']))
      {

            $shform='

          	<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>update your blood donation details?</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form target="" method="post">
                <br>
                <input type="hidden" name="userid" value="'.$_SESSION['user_id'].'">
                <button type="submit" name="delete" class="btn btn-danger">Yes</button>

                <button type="button" class="btn btn-info" data-dismiss="alert">
                <span aria-hidden="true">Oops! No </span>
                </button>      
            </form>
     </div>
                ';

      }


 
      if (isset($_POST['userid'])){

      $userId=$_POST['userid'];
      $currentdate=date_create();
      $currentdate=date_format($currentdate,'Y-m-d');     

      $userId=$_POST['userid'];

       $sql= "UPDATE signup SET ddate='$currentdate' where id= '$userId'";

      if(mysqli_query($conn,$sql))
                        {
                        	header("Location:index.php");
                        }
    else
    {

    	echo "Try again";
      }
    }
?>


<style>
	h1,h3{
		display: inline-block;
		padding: 10px;
	}
	.donors_data{
		background-color: white;
		border-radius: 5px;
		margin: 25px;
		 
		box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
		padding: 20px 10px 20px 30px;
	}

</style>

			<div class="container" style="padding: 60px 0;">
			<div class="row">
				<div class="col-md-12 col-md-push-1">
					<div class="panel panel-default" style="padding: 20px;">
						<div class="panel-body">
							
								<div class="alert alert-danger alert-dismissable" style="font-size: 18px; display: none;">
    						
    								<strong>Warning!</strong> Are you sure you want a save the life if you press yes, then you will not be able to show before 3 months.
    							
    							<div class="buttons" style="padding: 20px 10px;">
    								<input type="text" value="" hidden="true" name="today">
    								<button class="btn btn-primary" id="yes" name="yes" type="submit">Yes</button>
    								<button class="btn btn-info" id="no" name="no">No</button>
    							</div>
  							</div>










							<div class="heading text-center">
								<h3>Welcome </h3> <h1>   <?php  if(isset($_SESSION['name'])) echo $_SESSION['name'];?></h1>
							</div>
							<p class="text-center">Here you can manage your account and update your profile.</p>

                             <div class="test-success text-center" id="data" style="margin-top: 20px;">
                             <?php	if(isset($shform)) echo $shform; ?>
							       </div>
                           <?php
                                   $ddate=$_SESSION['ddate'];
                                   
                                   if ($ddate=='0')
                                   {

                                  echo 	'<form target="" method="post">
							<button style="margin-top: 20px;display: table;
	margin: 0 auto;" id="save_the_life"  name="date" class="btn btn-lg btn-danger" type="submit">I have donated blood</button>
	</form>';

                                   } 
                                   else{
                                         $start=date_create("$ddate");
                                         $end=date_create();
                                         $diff=date_diff($start,$end);
                                         $diffm=$diff->m;
                                       
                                         if ($diffm>=3) { echo 	'<form target="" method="post">
							<button style="margin-top: 20px;display: table;
	margin: 0 auto;" name="date" id="save_the_life" class="btn btn-lg btn-danger" type="submit">I have donated blood</button>
	</form>';}
	   else{

                                 ?>	<div class="donors_data">
									<span class="name">Congratulations !</span> 
                 <span>You have done a wonderful deed.Helping others gives a satisfaction nothing else can. You can not donate blood till</span>
                  <span> <script>cal();</script>
                 

                  <?php
                    $start=date_create($ddate);
                      
                      date_add($start,date_interval_create_from_date_string("3 months"));
echo date_format($start,"Y-m-d");
     
    ?>
                 
                  </span>
               
                  </div> 
    <?php
              }
              }
                           
                           
?>

							
							
								
				
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
<?php

 	}
	else
	{
		header("Location: ../index.php");
	}
 
		 
	
include 'include/footer.php'; 
?>