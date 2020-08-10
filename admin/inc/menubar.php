
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">News Portal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/<?php echo $_SESSION['image'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item has-treeview">
                  <a href="dashboard.php" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
              </li>
           
          
          <!-- All Categories Menu Start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-gem"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage All Category</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- All Categories Menu End -->

          <!-- All Users Menu Start -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>

              <p>
                All Post
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="posts.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="posts.php?do=Add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Post</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- All Users Menu End -->

          <?php
            if( $_SESSION['role'] == 0 ){ ?>
              <!-- All Users Menu Start -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    All Users
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="viewAllUsers.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View All Users</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="addNewUser.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add New User</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php  }
          else{ ?>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile.php?id=<?php echo $_SESSION['id'];?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Proflie</p>
                </a>
              </li>
            </ul>
          </li>
          <?php }
          ?>
              <!-- All Users Menu End -->


              <!-- All Users Menu Start -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-comments"></i>
                  <p>
                    All Comments
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="comments.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View All Comments</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="reply.php" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View All Replies</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- All Users Menu End -->
            

          
             
        

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>