 <?php
  include "inc/header.php";
?>
<?php 

    if(isset($_GET['id'])){
          $userId = $_GET['id'];

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
              <li class="breadcrumb-item active">Manage All Category</li>
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

          
               
                <a  href="updateUsers.php?edit=<?php echo $id?>" class="btn btn-md btn-primary" >EDIT</a>
              
            
            </form>


          </div>            
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
  </div><!-- /.content-wrapper -->

  <?php 
}
}
  ?>
  

<?php
  include "inc/footer.php";
?>