<?php include './includes/header.php'; ?>

<?php 
    // Create DB Object
    $db = new Database;

    if(isset($_POST['submit'])) {
        // Get id of post
       $id = mysqli_real_escape_string($db->link, $_POST['id']);
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
             $query = "UPDATE posts
                        SET title = '$title', category = '$category', body = '$body',
                        author = '$author', tags = '$tags'
                        WHERE id = '$id'";
     
             // Run query
             $update_res = $db->update($query);
         }
    }


    if(isset($_POST['delete'])) {
      // Get id of category
      $id = mysqli_real_escape_string($db->link, $_POST['id']);
  
      // Query
      $query = "DELETE FROM posts WHERE id = '$id'";
  
      // Run query
      $del_row = $db->delete($query);
       }
?>

<?php
if(isset($_GET['id'])) {    
    // Get id of category
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
?>

<?php if($post) : ?>
    <?php while($postRow = $post->fetch_assoc()) : ?>
<form method="post" role="form" action="edit_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input type="text" class="form-control" placeholder="Enter title..." name="title" value="<?php echo $postRow['title']; ?>">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" cols="30" rows="10" class="form-control" placeholder="Enter post body"><?php echo $postRow['body'];?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <?php if($categories) : ?>
            <?php while($row = $categories->fetch_assoc()) : ?>
                <?php 
                if($row['id'] == $postRow['category']) : 
                    $selected = "selected";
                else : 
                    $selected = '';
                endif;
                ?>
                <option <?php echo $selected; ?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
            <?php endwhile; ?>    
        <?php endif;?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" placeholder="Enter author name..." name="author" value="<?php echo $postRow['author'];?>">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input type="text" class="form-control" placeholder="Enter tags..." name="tags" value="<?php echo $postRow['tags'];?>">
  </div>
  <div>
      <input type="submit" class="btn btn-primary" name="submit" value="Update">
      <a href="add_post.php" class="btn btn-default">Cancel</a>
      <input type="submit" class="btn btn-danger" name="delete" value="Delete">
  </div>
  <br>
  <input type="hidden" name="id" value="<?php echo $id;?>">
</form>
    <?php endwhile;?>
<?php else :?>
    <p>No such post</p>
<?php endif;?>
<?php include './includes/footer.php'; ?>
