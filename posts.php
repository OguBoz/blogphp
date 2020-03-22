<?php include 'includes/header.php'; ?>
<?php
// Create DB Object
$db = new Database;
if(isset($_GET['category'])) {
    // Get id of post
    $id = mysqli_real_escape_string($db->link, $_GET['category']);
    // Query
    $query = "SELECT * FROM posts WHERE category = '$id'";
} else {
    $query = "SELECT * FROM posts";
}

// Run query
$posts= $db->select($query);

// Query
$query = "SELECT * FROM categories";

// Run query
$categories= $db->select($query);

if($posts) :
  while($row = $posts->fetch_assoc()) :
?>
<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by<a href="#"> <?php echo $row['author']; ?></a></p>
				    <p><?php echo textShortener($row['body']); ?></p>
           <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
          </div><!-- /.blog-post -->
   <?php endwhile;
   else :
     echo "<p>No posts yet</p>";
  endif; ?>
<?php include 'includes/footer.php'; ?>