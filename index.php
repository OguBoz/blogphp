<?php include 'includes/header.php'; ?>
<?php
// Create DB Object
$db = new Database;

// Query
$query = "SELECT * FROM posts ORDER BY id DESC";

// Run query
$posts= $db->select($query);

// Query
$query = "SELECT * FROM categories ORDER BY id DESC";

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