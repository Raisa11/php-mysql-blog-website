<?php
  include "inc/header.php";
?>


<section>
  <div class="container mt-10">
    <div class="row"> 
      <div class="col-md-8">
        <?php
        
          if((!isset($_GET['search'])) || ($_GET['search'] == Null)){

             header('Location:404.php');}
            else{ 
          

          $value = mysqli_real_escape_string($db,$_GET['search']);
        }
          ?>

          <?php
        
           $query = "SELECT * FROM post WHERE title LIKE '%$value%' OR description LIKE '%$value%' ORDER BY id DESC";
             $all_cat = mysqli_query($db, $query);
             $count = mysqli_num_rows($all_cat);
             if($count == 0){
              echo '<div class="alert alert-warning">No post found</div>';
             }
             else{
              while ( $row = mysqli_fetch_assoc($all_cat)){
               
                  $id           = $row['id'];
              $title        = $row['title'];
               $desc  = $row['description'];
                $thumbnail    = $row['thumbnail'];
                $post_date    = $row['post_date'];

      ?>

        <div class="blog">
          <a href="single.php?view=<?php echo $id; ?>">
            <h3><?php echo $title;?></h3>
          </a>

             <img src="admin/img/post/<?php echo $thumbnail; ?>" class="img-fluid">
             <?php

          $strCut = substr($desc,0 , 300);
          $desc = substr($strCut, 0, strrpos($strCut, ' '));

          ?>

              <p><?php echo $desc; ?>
           <a href="single.php?view=<?php echo $id; ?>" class="readmore">..read more</a>
         </p>
          <p><strong>Posted on: </strong><?php echo $post_date;?></p>
        </div>

        <?php
}
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

    