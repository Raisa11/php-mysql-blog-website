<?php
  include "inc/header.php";
?>

<?php 

    if(isset($_GET['edit'])){
          $userId = $_GET['edit'];

          $query = "SELECT * FROM user WHERE user_id = '$userId'";

          $result = mysqli_query($db,$query);

          while ($row = mysqli_fetch_assoc($result)) {
              $id       = $row['user_id'];
              $name     = $row['name'];
              $username = $row['user_name'];
              $email    = $row['email'];
              $phone    = $row['phone'];
              $role     = $row['user_role'];
              $image    = $row['image'];
                  $role     = $row['user_role'];
                  $status   = $row['status'];
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
              <li class="breadcrumb-item active">Update user</li>
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
                <input type="text" name="name" value="<?php echo $name;?>" placeholder="Full name" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" name="username" value="<?php echo $username;?>" placeholder="User Name" class="form-control">
              </div>
              <div class="form-group">
                <input type="email" name="email" value="<?php echo $email;?>" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" name="phone" value="<?php echo $phone;?>" placeholder="Phone Number" class="form-control">
              </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>
               <div class="form-group">
                <input type="password" name="re-password" placeholder="Retype-Password" class="form-control">
              </div>

              <div class="form-group">
                            <label>Profile Picture</label><br>
                            <?php
                              if ( !empty($image) ){ ?>
                                <img src="img/user/<?php echo $image; ?>" width="30" height="30">
                              <?php }
                              else{
                                echo 'Not Uploaded';
                              }
                            ?>
                            <br><br>
                            <input type="file" name="image" class="form-control-file">
                          </div>


             
                <div class="form-group">
                            
                            <select class="form-control" name="role">
                              <option value="1" <?php if($role == 1){ echo 'selected'; } ?>>Admin</option>
                              <option value="2" <?php if($role == 2){ echo 'selected'; } ?>>Editor</option>
                              <option value="3" <?php if($role == 3){ echo 'selected'; } ?>>Users</option>
                            </select>
                          </div>

                           <div class="form-group">
                           
                            <select class="form-control" name="status">
                              <option value="1" <?php if( $status == 1 ){ echo 'selected'; } ?> >Active</option>
                              <option value="2" <?php if( $status == 2 ){ echo 'selected'; } ?> >In-Active</option>
                            </select>
                          </div>

              <div class="form-group">
                <input type="hidden" value="<?php echo $id; ?>" name="update_user">
                <input type="submit" value="update" name="update" class="btn btn-md btn-primary">
              </div>
            
            </form>
          </div>            
        </div><!-- /.row -->

       
    </div><!-- /.container-fluid -->
    </div><!-- /.content -->
  </div><!-- /.content-wrapper -->
 <?php  }
        }
    ?>

    <?php 

      if(isset($_POST['update'])){
          $update_user    = $_POST['update_user'];
          $name           = $_POST['name'];
          $username       = $_POST['username'];
          $email          = $_POST['email'];
            $password     = $_POST['password'];
          $rePassword   = $_POST['re-password'];
          $phone          = $_POST['phone'];
          $role           = $_POST['role'];
          $status       = $_POST['status'];

          $image        = $_FILES['image']['name'];
          $imageTmp     = $_FILES['image']['tmp_name'];

        



         //  Image + Password both Change
          if ( !empty($image) && !empty($password) ){
            $hassedPass = sha1($password);

            // Remove existing image FROM Folder if Image are available
            if ( !empty($image) ){
              $query = "SELECT * FROM user WHERE user_id = '$update_user'";
              $the_user = mysqli_query($db, $query);
              while( $row = mysqli_fetch_assoc($the_user) ){
                $existing_image = $row['image'];
              }
              unlink("img/user/" . $existing_image );
            }

            // Image Move and Rename
            $avater = rand(0,5000000) . '_' . $image;
            move_uploaded_file($imageTmp, "img/user/" . $avater);

            $sql = "UPDATE user SET name='$name', user_name='$username', email='$email',phone='$phone', password='$hassedPass',image='$avater',user_role='$role', status='$status'  WHERE user_id = '$update_user'";

            $updateUser = mysqli_query($db, $sql);
 
            if ( $updateUser ){
              header("Location: viewAllUsers.php");
            }
            else{
              die("Database Connection Failed." . mysqli_error($db) );
            }
          }

          //  Image Change + Password Not Change
          else if ( !empty($image) && empty($password) ){
            // Remove existing image FROM Folder if Image are available
            if ( !empty($image) ){
              $query = "SELECT * FROM user WHERE id = '$update_user'";
              $the_user = mysqli_query($db, $query);
              while( $row = mysqli_fetch_assoc($the_user) ){
                $existing_image = $row['image'];
              }
              unlink("img/user/" . $existing_image );
            }

            // Image Move and Rename
            $avater = rand(0,5000000) . '_' . $image;
            move_uploaded_file($imageTmp, "img/user/" . $avater);

            $sql = "UPDATE user SET name='$name', user_name='$username', email='$email',phone='$phone', password='$hassedPass',image='$avater',user_role='$role', status='$status'  WHERE user_id = '$update_user'";

            $updateUser = mysqli_query($db, $sql);
 
            if ( $updateUser ){
             header("Location: viewAllUsers.php");
            }
            else{
              die("Database Connection Failed." . mysqli_error($db) );
            }
          }

          //  Image Not Change + Password Change
          else if ( empty($image) && !empty($password) ){
            $hassedPass = sha1($password);

             $sql = "UPDATE user SET name='$name', user_name='$username', email='$email',phone='$phone', password='$hassedPass',user_role='$role', status='$status'  WHERE user_id = '$update_user'";
            $updateUser = mysqli_query($db, $sql);
 
            if ( $updateUser ){
               header("Location: viewAllUsers.php");
            }
            else{
              die("Database Connection Failed." . mysqli_error($db) );
            }
          }


          //  Image + Password both are not Changed
          else if ( empty($image) && empty($password) ){
             $sql = "UPDATE user SET name='$name', user_name='$username', email='$email',phone='$phone', user_role='$role', status='$status'  WHERE user_id = '$update_user'";
            $updateUser = mysqli_query($db, $sql);
 
            if ( $updateUser ){
               header("Location: viewAllUsers.php");
            }
            else{
              die("Database Connection Failed." . mysqli_error($db) );
            }
          }




        }

      

    ?>

  

<?php
  include "inc/footer.php";
?>