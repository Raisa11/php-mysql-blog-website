<?php
  include "inc/header.php";
?>
<?php
$perPage = 2;
if(isset($_GET['page'])){
  $page = $_GET['page'];

}
else{
  $page=1;
}
$startfrom = ($page-1)*$perPage;
?>

<?php
  include "slider.php";
?>



<section>
  <div class="container mt-10">
    <div class="row"> 
      <div class="col-md-8">
        <?php
          $query = "SELECT * FROM post WHERE status=1 ORDER BY id desc LIMIT $startfrom,$perPage ";
          $all_post = mysqli_query($db, $query);
          while( $row = mysqli_fetch_assoc($all_post) ){
            $id           = $row['id'];
            $title        = $row['title'];
            $desc  = $row['description'];
            $thumbnail    = $row['thumbnail'];
            $category_id  = $row['category_id'];
            $user_id      = $row['user_id'];
            $status       = $row['status'];
            $post_date    = $row['post_date'];
            ?>


        <div class="blog">
          <a href="single.php?view=<?php echo $id; ?>">
            <h3><?php echo $title; ?></h3>
          </a>

          <img src="admin/img/post/<?php echo $thumbnail; ?>" class="img-fluid">
          <?php

          $strCut = substr($desc,0 , 300);
          $desc = substr($strCut, 0, strrpos($strCut, ' '));

          ?>

          <p><?php echo $desc; ?>
          
            <a href="single.php?view=<?php echo $id; ?>" class="readmore">..read more</a>
            
         
          </p>

        </div>

        <?php  }
        ?>

        
      </div>

      <div class="col-md-4 mt-20">
        <?php include "inc/sidebar.php"; ?>
      </div>
    </div>

    <div class="row ">
      <?php 
      $query = "SELECT * FROM post";
     $all_post = mysqli_query($db, $query);
     $count_row = mysqli_num_rows($all_post);
     $total_page = ceil($count_row/$perPage);
      echo "<span class='paginationg'><a href='index.php?page=1'>"."First page"."  "."</a>";

      for ($i=1; $i <= $total_page ; $i++) { 
       echo "<a href='index.php?page=$i'>".$i."</a>";
      }
       echo "<a href='index.php?page=$total_page'>"."Last page"."</a></span>"; ?>
    </div>
  </div>
</section>




<?php
  include "inc/footer.php";
?>

    