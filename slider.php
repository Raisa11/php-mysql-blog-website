
<section>
  <div class="container mt-20">
    <div class="row">
      
      

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <?php
          $i = 0;
          $query = "SELECT * FROM post  ";
          $all_post = mysqli_query($db, $query);
          while( $row = mysqli_fetch_assoc($all_post) ){
            
            $thumbnail    = $row['thumbnail'];
            $i++;
            
            ?>

    <div class="carousel-item <?php if ($i == 1) echo 'active'; ?>">
      <img class="d-block w-100" src="admin/img/post/<?php echo $thumbnail; ?>" alt="First slide">
    </div>
    <?php
}
?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

   
</div>


</div>
  </div>
</section>
