<?php //include '../includes/connection.php'; ?>
<?php include '../includes/login.php'; ?>
<?php include 'includes/adminFunction.php'; ?>
<?php include 'header.html'; ?>

<div class="container">
 <h5 class="text-primary">Welcome: <?php echo $_SESSION['surname']; ?> <a class="pull-right btn btn-primary" href="../includes/logout.php"> Logout </a></h5>
          
            <hr>

  
<div class="col-lg-12">
   		
	<div class="col-lg-6">
  <center><h4 class="text-primary">CREATE USERS TO USE THE PHC SYSTEM</h4></center>
      <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
  <div class="form-group">
  <label class="control-label col-sm-4">Username</label>
  <div class="col-sm-6">
     <input name="username" type="text" class="form-control" placeholder="Username">
  </div>
 </div> 

  <div class="form-group">
  <label class="control-label col-sm-4">Password</label>
  <div class="col-sm-6">
      <input name="password" type="password" class="form-control" placeholder="Password">
  </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-4">Sur Name</label>
  <div class="col-sm-6">
      <input name="surname" type="text" class="form-control" placeholder="Surname">
  </div>
 </div>

 <div class="form-group">
  <label class="control-label col-sm-4">Last Name</label>
  <div class="col-sm-6">
     <input name="lastname" type="text" class="form-control" placeholder="Last Name">
  </div>
 </div> 

 <div class="form-group">
  <label class="control-label col-sm-4">Email</label>
  <div class="col-sm-6">
     <input name="email" type="email" class="form-control" placeholder="Email">
  </div>
 </div> 

<div class="form-group">
  <label class="control-label col-sm-4">Upload Image</label>
  <div class="col-sm-6">
     <input name="image" type="file" class="form-control" placeholder="Upload Image">
  </div>
 </div> 


  <div class="form-group">
  <label class="control-label col-sm-4" for="role">Select Role:</label>
  <div class="col-sm-6">
  <select class="form-control" name="role" id="role">
    <option value="admin">ADMIN</option>
    <option value="receptionist">RECEPTIONIST</option>
  </select>
  </div>
</div> 

   <?php
    addUser();

   ?>
  <button  class="btn btn-primary center-block" name="addUser" type="submit">Add User</button>
  </form>
		
	</div>	

	<div class="col-lg-6">
	<center><h4 class="text-primary">CURRENT USERS OF THE PHC SYSTEM</h4></center>

  <div class="table-hover">
  <table class="table">
    <th>Username</th>
    <th>Surname</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Role</th>
     <th>Date</th>
    <th></th>
    <tr>
      <?php
      
        displayUsers();      
      ?>
      <?php
      deleteUsers();
      ?>
    </tr>
    </table>
    </div>
			
		
	</div>	


	</div>

  

                    


					

 
					
            </div>


<?php include 'footer.html'; ?>