<?php include 'includes/header.php'; ?>
<?php
if(isset($_GET['id'])) {
    // Create DB Object
    $db = new Database;

    // Get id of post
    $id = mysqli_real_escape_string($db->link, $_GET['id']);
    
    // Query
    $query = "SELECT * FROM posts WHERE id = '$id'";
    
    // Run query
    $post = $db->select($query);
    
    // Query
    $query = "SELECT * FROM categories";
    
    // Run query
    $categories= $db->select($query);

} else {
    die("No such post!");
}


if($post) :
    while($row = $post->fetch_assoc()) :
  ?>
  <div class="blog-post">
              <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
              <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by<a href="#"> <?php echo $row['author']; ?></a></p>
                      <p><?php echo $row['body']; ?></p>
            </div><!-- /.blog-post -->
     <?php endwhile;
     else :
       echo "<p>No such post</p>";
    endif; ?>
  <?php include 'includes/footer.php'; ?>