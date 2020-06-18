<?php
  include "inc/header.php";
?>


<section>
  <div class="container">
    <div class="row"> 
      <div class="col-md-8">
        <?php
          // All Category for specific ID
          if ( isset($_GET['cat']) ){
            $the_cat = $_GET['cat'];
            // echo $the_cat;

            $query = "SELECT * FROM post WHERE category_id = '$the_cat'";
            $all_post = mysqli_query($db, $query);

            while( $row = mysqli_fetch_assoc($all_post) ){
              $post_id      = $row['id'];
              $title        = $row['title'];
              $desc  = $row['description'];
              $thumbnail    = $row['thumbnail'];
              $category_id  = $row['category_id'];
              $user_id      = $row['user_id'];
              $status       = $row['status'];
              $post_date    = $row['post_date'];
            ?>
            <div class="blog">
              <a href="single.php?view=<?php echo $post_id; ?>">
                <h3><?php echo $title; ?></h3>
              </a>
                
              <img src="admin/img/post/<?php echo $thumbnail; ?>" class="img-fluid">

               <?php

          $strCut = substr($desc,0 , 300);
          $desc = substr($strCut, 0, strrpos($strCut, ' '));

          ?>

          <p><?php echo $desc; ?>
          
            <a href="single.php?view=<?php echo $post_id;  ?>" class="readmore">..read more</a>

             
            </div>
          <?php } 
        } 

        else{
          
        }



        ?>
        
      </div>

      <div class="col-md-4 mt-20">
        <?php include "inc/sidebar.php"; ?>
      </div>
    </div>
  </div>
</section>


<?php
  include "inc/footer.php";
?>   