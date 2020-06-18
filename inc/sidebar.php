<!-- Search Field -->
        <div class="sidebar-box">
          <h3>Search News</h3>
          <form action="search.php" method="get">
            <div class="form-group">
              <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-primary btn-flat" value="search">
            </div>
          </form>

        </div>


        <!-- Category List -->
        <div class="sidebar-box mt-20">
          <h3>All Category</h3>
          <ul>
            <?php
             $query = "SELECT * FROM category";
              $all_cat = mysqli_query($db, $query);
                while ( $row = mysqli_fetch_assoc($all_cat) ) {
                 $cat_id     = $row['id'];
                  $cat_name   = $row['name'];
                  
            ?>
            <li><a href="category.php?cat=<?php echo $cat_id; ?>" style="color:black;"><?php echo $cat_name; ?></a></li>

            <?php
          }
           ?>
          </ul>
        </div>

        <!-- Latest Post -->
        <div class="sidebar-box mt-20">
          <h3>Latest News</h3>

          <?php
          $query = "SELECT * FROM post ORDER BY id DESC limit 2";
          $all_post = mysqli_query($db, $query);
          while( $row = mysqli_fetch_assoc($all_post) ){
            $id           = $row['id'];                        
           $title        = $row['title'];
                                   
           $thumbnail    = $row['thumbnail'];
          $post_date    = $row['post_date'];
          ?>
            
           <div class="row latest-news">
             <div class="col-md-5">
              <img src="admin/img/post/<?php echo $thumbnail;?>" class="w-100">
             </div> 

             <div class="col-md-7">
               <a href="single.php?view=<?php echo $id;?>"><h5><?php echo $title;?></h5></a>
               <p><?php echo $post_date;?></p>
             </div>
           </div> 

           <?php
         }

           ?>

          

        </div>

        <!-- Meta Tags -->
        <div class="sidebar-box mt-20">
          <h3>Meta Tags</h3>
          
          <div class="meta-tags">
            <ul>
              <li>Category</li>
              <li>Category</li>
              <li>Category</li>
              <li>Category</li>
              <li>Category</li>
              <li>Category</li>
              <li>Category</li>
            </ul>
          </div>
        </div>