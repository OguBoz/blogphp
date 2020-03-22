<?php include './includes/header.php'; ?>
<?php 
    // Create DB Object
    $db = new Database;

    if(isset($_POST['submit'])) {
        // Get id of post
        $title = mysqli_real_escape_string($db->link, $_POST['title']);

         // Get id of post
         $body = mysqli_real_escape_string($db->link, $_POST['body']);

         // Get id of post
        $category = mysqli_real_escape_string($db->link, $_POST['category']);

         // Get id of post
         $author = mysqli_real_escape_string($db->link, $_POST['author']);

          // Get id of post
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

         // Validate data
         if($title == '' || $body == '' || $category == '' || $author == '' || $tags == '') {
             $error = 'Fill out all the fields please!';
         } else {
             // Query
             $query = "INSERT INTO posts(category, title, body, author, tags) VALUES('$category', '$title', '$body', '$author', '$tags')";
     
             // Run query
             $insert_res = $db->insert($query);
         }
    }
?>


<?php
    // Query
    $query = "SELECT * FROM categories";
    // Run query
    $categories= $db->select($query);
?>

<form method="post" role="form" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" class="form-control" placeholder="Enter title..." name="title">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" cols="30" rows="10" class="form-control" placeholder="Enter post body" name="body"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
    <?php if($categories) : ?>
            <?php while($row = $categories->fetch_assoc()) : ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
            <?php endwhile; ?>    
        <?php endif;?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" placeholder="Enter author name..." name="author">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input type="text" class="form-control" placeholder="Enter tags..." name="tags">
  </div>
  <div>
      <input type="submit" value="Create" name="submit" class="btn btn-primary">
      <a href="add_post.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>

<?php include './includes/footer.php'; ?>
