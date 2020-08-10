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
              <li class="breadcrumb-item active">Manage All Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
      if ( $_SESSION['role'] == 0 ){ ?>
        <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <table id="data" class="table table-striped table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Name</th>
                  <th scope="col">UserName</th>
                  <th scope="col">Email</th>
                  <th scope="col">PhoneNo</th>
                  <th scope="col">Photo</th>
                  <th scope="col">UserRole</th>
                   <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>


            <?php 

              $query = "SELECT * FROM user";
               $i = 0;
               $allUser = mysqli_query($db, $query);
               $result = mysqli_num_rows($allUser);
              if($result == 0){
                echo "no data found in the database";
              }
              else{
             
              while ($row = mysqli_fetch_assoc($allUser)) {
                  $id       = $row['user_id'];
                  $name     = $row['name'];
                  $username = $row['user_name'];
                  $email    = $row['email'];
                  $phone    = $row['phone'];
                  $image    = $row['image'];
                  $role     = $row['user_role'];
                  $status   = $row['status'];
                  $i++;
                  ?>

              <tr>
                  <th scope="row"><?php echo $i;?></th>
                  <td><?php echo $name;?></td>
                  <td><?php echo $username;?></td>
                  <td><?php echo $email;?></td>
                  <td><?php echo $phone;?></td>

                  <td><?php
                  if(!empty($image)){ ?>
                    <img src="img/user/<?php echo $image;?>" height="50" width="50" alt="">
                    <?php
                  }
                  else{ ?>

                     <img src="img/user/default.png" height="50" width="50" alt=" ">

                     <?php

                }

                  ?>
                 </td>
                  <td>
                    <?php
                      if ( $role == 0 ){ ?>
                        <span class="badge badge-success">Admin</span>
                      <?php }
                      else if($role == 1){ ?>
                        <span class="badge badge-primary">Editor</span>
                      <?php }

                       else if($role == 2){ ?>
                        <span class="badge badge-warning">User</span>
                      <?php }
                    ?>
                  </td>
                  <td> <?php
                  if ($status == 1) { ?>

                      <span class="badge badge-success">Active</span>
                      <?php
                    }
                      else if ($status == 2) { ?>
                        <span class="badge badge-warning">Inactive</span>
                        <?php
                      }
                  

                  ?></td>
                  <td>
                    <div class="action-item">
                      <ul>
                        <li><a href="updateUsers.php?edit=<?php echo $id;?>"><i class="fa fa-edit"></i></a></li>
                        <li>
                          <a href="viewAllUsers.php?delete=<?php echo $id;?>">
                            <i class="fa fa-trash"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>

            <?php 
              }

}
            ?>

              </tbody>
            </table>
          </div>   

        <?php 

          if(isset($_GET['delete'])){
            $userDelete = $_GET['delete'];

            $query = "SELECT * FROM user WHERE user_id='$userDelete'";

            $result = mysqli_query($db,$query);

            while ($row = mysqli_fetch_assoc($result)) {
              # code...
              $name = $row['image'];
            }

            unlink("img/$name");


            $query = "DELETE FROM user WHERE user_id='$userDelete'";

            $result = mysqli_query($db,$query);

            if($result){
              header('Location:viewAllUsers.php');
            }else{
              die("".mysqli_error());
            }

          }

        ?>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
       <?php }
       else{
         echo "You are Not Authorized User";
       }
      
    ?> 

    
  </div><!-- /.content-wrapper -->
  

<?php
  include "inc/footer.php";
?>