<?php
  include "inc/header.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add New User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="name" placeholder="Full name" class="form-control" required="required">
              </div>
              <div class="form-group">
                <input type="text" name="username" placeholder="User Name" class="form-control">
              </div>
              <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" name="phone" placeholder="Phone Number" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>
               <div class="form-group">
                <input type="password" name="re-password" placeholder="Retype-Password" class="form-control">
              </div>

              <div class="form-group">
                <input type="file" name="image"class="form-control">
              </div>

              <div class="form-group">
               
                <select name="role" class="form-control">
                  <option>Please Select Your Role</option>
                  <option value="0">Admin</option>
                  <option value="1">Editor</option>
                   <option value="2">User</option>
                </select>
              </div>

               <div class="form-group">
              
                <select name="status" class="form-control">
                  <option> Account Status</option>
                 
                  <option value="1">Active</option>
                   <option value="2">Inactive</option>
                </select>
              </div>

              <div class="form-group">
                <input type="submit" value="submit" name="adduser"class="btn btn-md btn-primary">
              </div>
            
            </form>
          </div>            
        </div><!-- /.row -->

    <?php 

      if(isset($_POST['adduser'])){
          $name = mysqli_real_escape_string($db, $_POST['name']);
          $username   = $_POST['username'];
          $email      = $_POST['email'];
          $phone      = $_POST['phone'];
          $password   = $_POST['password'];
          $repassword   = $_POST['re-password'];
          $role       = $_POST['role'];
          $status     = $_POST['status'];

          $image       = $_FILES['image']['name'];
          $image_tmp   = $_FILES['image']['tmp_name'];
          if($password == $repassword){
             $haspassword = sha1($password);
          }

           $extn = strtolower(end(explode(".", $image)));

          $extensions= array("jpeg","jpg","png");
      
           if(in_array($extn,$extensions) === false){
              header('Location: addNewUser.php');
           }else{

              $random_number = rand(0,100000);

              $updatedimage = $random_number.'_'.$image;

              move_uploaded_file($image_tmp,"img/user/".$updatedimage);

            
              
              $query = "INSERT INTO user (name,user_name,email,phone, password,image,user_role,status) VALUES('$name','$username','$email','$phone','$haspassword','$updatedimage','$role','$status')";

              $add_user = mysqli_query($db,$query);

              if($add_user){
               
                header('Location: viewAllUsers.php');
              }else{
                die("Error: ".mysqli_error($db));
              }
  }
      }

    ?>


      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
  </div><!-- /.content-wrapper -->
  

<?php
  include "inc/footer.php";
?>