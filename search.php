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
          

          $value = $_GET['search'];}
          ?>

          <?php
        
           $query = "SELECT * FROM post WHERE title LIKE '%$value%' OR description LIKE '%$value%'";
             $all_cat = mysqli_query($db, $query);
              while ( $row = mysqli_fetch_assoc($all_cat)){
               
                  $id           = $row['id'];
              $title        = $row['title'];
               $description  = $row['description'];
                $thumbnail    = $row['thumbnail'];
                $post_date    = $row['post_date'];

      ?>

        <div class="blog">
          <a href="single.php?view=<?php echo $id; ?>">
            <h3><?php echo $title;?></h3>
          </a>

             <img src="admin/img/post/<?php echo $thumbnail; ?>" class="img-fluid">

          <p><?php echo $description;?></p>
          <p><strong>Posted on: </strong><?php echo $post_date;?></p>
        </div>

        <?php
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

    