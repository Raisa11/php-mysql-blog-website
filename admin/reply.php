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
                      <th scope="col">Reply</th>
                      <th scope="col">Date</th>
                      <th scope="col">Post Title</th>
                      <th scope="col"> Original Comment </th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      $query = "SELECT * FROM reply";
                      $all_reply = mysqli_query($db, $query);
                      $i=0;
                     while( $row = mysqli_fetch_assoc($all_reply) ){
                      $rep_id = $row['id'];
                  $rep_desc = $row['rep_desc'];
                  $post_id = $row['post_id'];
                  $cmt_id     = $row['cmt_id'];
                  $author     = $row['author'];
                
                  $rep_date   = $row['date'];
                        $i++;
                      ?>

                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $author; ?></td>
                          <td><?php echo $rep_desc; ?></td>
                          <td><?php echo $rep_date; ?></td>
                           <?php
                            $query = "SELECT * FROM post WHERE id = '$post_id'";
                                  $all_post = mysqli_query($db, $query);
                                  
                                  while( $row = mysqli_fetch_assoc($all_post) ){
                                    $id           = $row['id'];
                                    $title        = $row['title'];}

                           ?>

                           <td><?php echo $title; ?></td> 
                            <?php
                      $query = "SELECT * FROM comment WHERE cmt_id = ' $cmt_id'";
                      $all_comment = mysqli_query($db, $query);
                     
                      while ( $row = mysqli_fetch_assoc($all_comment) ) {
                        $cmt_id       = $row['cmt_id'];
                      
                        $cmt_desc     = $row['cmt_desc'];}
                        ?>

                             <td><?php echo $cmt_desc; ?></td>
                          <td>
                            <div class="action-item">
                              <ul>
                               
                                  <a href="reply.php?del=<?php echo $rep_id; ?>" class="btn-sm btn-danger" >
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
               

                  if(isset($_GET['del'])){
                  $the_id = $_GET['del'];
                  $query="DELETE FROM reply WHERE id = '$the_id' ";
                  $destroy_post = mysqli_query($db, $query);
                  if($destroy_post){
                    header('Location:reply.php');
                  }
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

  
