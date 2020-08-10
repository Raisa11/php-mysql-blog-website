<?php
  include "inc/header.php";
?>


<section>
  <div class="container">
    <div class="row"> 
      <div class="col-md-8">
        <?php
          // Blog Single View for exact post from Home or Category Page
          if ( isset($_GET['view']) ){
            $the_cat = $_GET['view'];
            $query = "SELECT * FROM post WHERE id = '$the_cat'";
            $all_post = mysqli_query($db, $query);
            while( $row = mysqli_fetch_assoc($all_post) ){
              $id           = $row['id'];
              $title        = $row['title'];
              $description  = $row['description'];
              $thumbnail    = $row['thumbnail'];
              $category_id  = $row['category_id'];
              $user_id      = $row['user_id'];
              $status       = $row['status'];
              $post_date    = $row['post_date'];
            ?>
            <div class="blog">
                <h3><?php echo $title;?></h3>
                <img src="admin/img/post/<?php echo $thumbnail;?>"class="img-fluid">
                <p><?php echo $description;?></p>
            </div>
           <?php

           if( !empty($_SESSION['id']) && !empty($_SESSION['name'])){ ?>

            <div class="comments-section">
              <h3>Add Comments</h3>
              <form action="" method="POST">
                  <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Your name"> 
                </div>
                <div class="form-group">
                  <textarea name="comment" class="form-control" placeholder="Add Your Comment" rows="3"></textarea>
                </div>

                <div class="form-group">
                  <input type="hidden" name="postid" value="<?php echo $id; ?>">
                  <input type="submit" name="addComment" class="btn btn-primary" value="Add Comment">
                </div>

              </form>
            </div>


          

          <?php }

          else{ ?>
            <h3>Login here to post a comment</h3>
            <form action="login.php" method="post">
              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                
                <input type="submit" name="slogin" class="btn-main btn-primary" value="Login">
                <a href="register.php">or Create an account?</a>
              </div>
            </form>

         <?php }


           ?>

            

             
              <h2>comments:</h2>

              <?php
                $query = "SELECT * FROM comment WHERE post_id = '$id' AND is_active = 1";
                $showComment = mysqli_query( $db, $query );
                while( $row = mysqli_fetch_assoc($showComment) ){
                  $cmt_id     = $row['cmt_id'];
                  $author     = $row['author'];
                  $cmt_desc   = $row['cmt_desc'];
                  $cmt_date   = $row['cmt_date'];
                  ?>
                  <div class="existing-comment">
                  <h5> <strong>Name: </strong><?php echo $author;?></h5>
                    <p> Comment: <?php echo $cmt_desc;?></p>                    
                    <p> Date:<date><?php echo $cmt_date;?></date></p>
                    <button class='replybtn btn-sm btn-primary '>reply</button>
                             <div class='replyform'></div>
                              </div>
                            
                    <?php
                $query = "SELECT * FROM reply WHERE post_id = '$id' AND cmt_id = ' $cmt_id' ";
                $showReply = mysqli_query( $db, $query );
                while( $row = mysqli_fetch_assoc($showReply) ){
                  $rep_desc = $row['rep_desc'];
                  $post_id = $row['post_id'];
                  $cmt_id     = $row['cmt_id'];
                  $author     = $row['author'];
                
                  $rep_date   = $row['date'];
                  ?>

                  <div class="replies">

                  <h6 > <strong>Name:</strong><?php echo $author;?></h6>
                    <p> Reply: <?php echo $rep_desc;?></p>                    
                    <p> Date:<date><?php echo $rep_date;?></date></p>
                    
                    <button class='replybtn btn-sm btn-primary '>reply</button>
                             <div class='replyform'></div>
                             </div>

                 
                  <?php  } } } }

          if ( isset($_POST['addComment']) ){
          $author   = $_POST['name'];
          $post_id  = $_POST['postid'];
          $desc     = $_POST['comment'];


          $query = "INSERT INTO comment (author, cmt_desc, post_id, cmt_date ) VALUES ('$author','$desc', '$post_id', now() )";

          $add_comment = mysqli_query($db, $query);

          if ( $add_comment ){
            header("Location: single.php");
          }
          else{
            die( "MySQLi Error " . mysqli_error($db) );
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
<script type="text/javascript">
    var varHtml = "<form method='post' class='form-group' ><input type='text' class='form-control' name='name' placeholder= 'Your name' ><textarea class='form-control' name='reply' ></textarea>  <input type='hidden' name='postid' value='<?php echo $id;?>'> <input type='hidden' name='cmtid' value='<?php echo $cmt_id;?>'> <input type='submit' class='btn btn-primary' class='form-control' name='addReply'  /> </form>";


var allElements = document.body.getElementsByClassName("replybtn");

var addCommentField = function() {
  for (var i = 0; allElements.length > i; i++) {
    if (allElements[i] === this) {
      console.log("this " + i);

      if (document.getElementsByClassName("replyform")[i].innerHTML.length === 0) {
        document.getElementsByClassName("replyform")[i].innerHTML = varHtml;
      }

    }
  }
};


for (var i = 0; i < allElements.length; i++) {
  allElements[i].addEventListener('click', addCommentField, false);
}
  </script>

  <?php
if (isset($_POST['addReply'])) {

  $rep_desc = $_POST['reply'];
  $post_id = $_POST['postid'];
  $cmt_id = $_POST['cmtid'];
  $name = $_POST['name'];

  $query = "INSERT INTO reply (rep_desc,post_id,cmt_id,author,date) VALUES ('$rep_desc' , '$post_id
  ', '$cmt_id' , '$name' , now() )";
  $add_reply = mysqli_query($db, $query);

          if ( $add_reply ){
            header("Location: single.php");
          }
          else{
            die( "MySQLi Error " . mysqli_error($db) );
          }
}
  
  include "inc/footer.php";
  ?>
  
   