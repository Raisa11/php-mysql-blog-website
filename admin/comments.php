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
            <!-- All Category List Start -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">All Category</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <!-- Table Start -->
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Sl.</th>
                      <th scope="col">Author</th>
                      <th scope="col">Description</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      $query = "SELECT * FROM comment";
                      $all_comment = mysqli_query($db, $query);
                      $i=0;
                      while ( $row = mysqli_fetch_assoc($all_comment) ) {
                        $cmt_id       = $row['cmt_id'];
                        $author       = $row['author'];
                        $cmt_desc     = $row['cmt_desc'];
                        $cmt_date     = $row['cmt_date'];
                        $is_active    = $row['is_active'];
                        $i++;
                      ?>

                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $author; ?></td>
                          <td><?php echo $cmt_desc; ?></td>
                          <td><?php echo $cmt_date; ?></td>
                          <td>
                            <?php

                              if ( $is_active == 0 ){ ?>
                                <span class="badge badge-warning">Inactive</span>
                              <?php }
                              else{ ?>
                                <span class="badge badge-success">Active</span>
                              <?php }

                            ?>
                          </td>
                          <td>
                            <div class="action-item">
                              <ul>
                                <li><a href="comments.php?app=<?php echo $cmt_id; ?>" class="btn-sm btn-primary">approve</a></li>
                                <li>
                                  <a href="comments.php?del=<?php echo $cmt_id; ?>" class="btn-sm btn-danger" >
                                    remove
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>

                        

                    <?php  }
                    ?>
                    
                    
                  </tbody>
                </table>

                <?php
                if(isset($_GET['app'])){
                  $the_id = $_GET['app'];
                  $query = "UPDATE comment SET is_active=1 WHERE cmt_id = '$the_id' ";
                    $comment = mysqli_query( $db, $query );
                 }

                  if(isset($_GET['del'])){
                  $the_id = $_GET['del'];
                  $query="DELETE FROM comment WHERE cmt_id = '$the_id' ";
                  $destroy_post = mysqli_query($db, $query);
                }


                ?>
                <!-- Table End -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- All Category List End -->
          </div>    

               
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
  </div><!-- /.content-wrapper -->
  

<?php
  include "inc/footer.php";
?>

  
