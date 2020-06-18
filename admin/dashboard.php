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
            <h1 class="m-0 text-dark">Welcome to the News Portal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a> </li>
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
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
             $query = "SELECT * FROM category";
           $allUser = mysqli_query($db, $query);
           if($allUser){
            // Return the number of rows in result set
            $rowcount=mysqli_num_rows($allUser);
            
           }
            ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php

                echo $rowcount;

                ?></h3>

                <p>total category</p>
              </div>
              <div class="icon">
                <i class="far fa-gem"></i>
              </div>
              <a href="category.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">

            <?php
             $query = "SELECT * FROM post";
           $allUser = mysqli_query($db, $query);
           if($allUser){
            // Return the number of rows in result set
            $rowcount=mysqli_num_rows($allUser);
            
           }?>
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $rowcount;?></h3>

                <p>Total Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="posts.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php
           $i = 0;
           $query = "SELECT * FROM user";
           $allUser = mysqli_query($db, $query);
          
           while ($row = mysqli_fetch_assoc($allUser)) {
                   $id       = $row['user_id'];
                   $i++;
           
                }

          
                 

          ?>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $i;
          ?></h3>

                <p>Total Users </p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="viewAllUsers.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <?php
             $query = "SELECT * FROM comment";
           $allUser = mysqli_query($db, $query);
           if($allUser){
            // Return the number of rows in result set
            $rowcount=mysqli_num_rows($allUser);
            
           }?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $rowcount;?></h3>

                <p>total comments</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="comments.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
         <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-bars"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Category</span>
                <a href="category.php"><span class="info-box-number">add new</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-clipboard"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Posts</span>
                <a href="posts.php"><span class="info-box-number">add new</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <a href="addNewUser.php"><span class="info-box-number">add new</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">view site</span>
                <a href="../index.php"><span class="info-box-number">click here</span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
  include "inc/footer.php";
?>

  
