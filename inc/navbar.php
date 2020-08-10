<header>
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="index.php">News Portal</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <?php

              $query = "SELECT * FROM category";
              $all_cat = mysqli_query($db, $query);
                while ( $row = mysqli_fetch_assoc($all_cat) ) {
                  $cat_id     = $row['id'];
                  $cat_name   = $row['name'];
                  ?>
                  <li class="nav-item active">
                    <a class="nav-link" href="category.php?cat=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a>
                  </li>

              <?php  }

            ?>

            <?php
            if (!empty($_SESSION['id'])) {  ?>

              <li class="nav-item active">
                    <a class="nav-link lg" href="logout.php">Log out</a>
                  </li>
             
           <?php }

           else{ ?>
            <li class="nav-item active">
                    <a class="nav-link lg" href="#login">Login</a>
                  </li>



          <?php }
            ?>
            



              
              
              
              
            </ul>

          </div>
        </nav>
      </div>
    </header>