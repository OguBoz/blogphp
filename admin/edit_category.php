<?php include './includes/header.php'; ?>

<?php 
    // Create DB Object
    $db = new Database;

    if(isset($_POST['submit'])) {
    // Get id of category
    $id = mysqli_real_escape_string($db->link, $_POST['id']);
        // Get id of post
        $name = mysqli_real_escape_string($db->link, $_POST['category']);

         // Validate data
         if($name == '') {
             $error = 'Fill out all the fields please!';
         } else {
             // Query
             $query = "UPDATE categories
                        SET name = '$name'
                        WHERE id = '$id'";
     
             // Run query
             $update_res = $db->update($query);
         }
    }

    if(isset($_POST['delete'])) {
    // Get id of category
    $id = mysqli_real_escape_string($db->link, $_POST['id']);

    // Query
    $query = "DELETE FROM categories WHERE id = '$id'";

    // Run query
    $del_row = $db->delete($query);
     }
?>

<?php
    if(isset($_GET['id'])) {
    // Get id of category
    $id = mysqli_real_escape_string($db->link, $_GET['id']);

    // Query
    $query = "SELECT * FROM categories WHERE id = '$id'";
    
    // Run query
    $category = $db->select($query);
    }

    // Query
    $query = "SELECT * FROM categories";
    
    // Run query
    $categories= $db->select($query);
?>
<?php if($categories) : ?>
    <?php while($row = $category->fetch_assoc()) : ?>
<form method="post" action="edit_category.php" role="form">
  <div class="form-group">
    <label>Category Name</label>
    <select name="category" class="form-control">
        <?php if($categories) : ?>
            <?php while($row = $categories->fetch_assoc()) : ?>
                <?php 
                if($row['id'] == $id) : 
                    $selected = "selected";
                else : 
                    $selected = '';
                endif;
                ?>
                <option <?php echo $selected; ?> value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
            <?php endwhile; ?>    
        <?php endif;?>
    </select>
  </div>
  <input type="submit" class="btn btn-primary" name="submit" value="Update">
      <a href="add_post.php" class="btn btn-default">Cancel</a>
      <input type="submit" class="btn btn-danger" name="delete" value="Delete">
      <input type="hidden" name="id" value="<?php echo $id;?>">
</form>
<br>
<?php
endwhile; 
else : 
    echo "<p>No such category</p>";
?>
<?php endif; ?>
<?php include './includes/footer.php'; ?>
